<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\{User,Message,Category,Blog,Tag,Event};
use Hash;
use App\Jobs\SendSms;
use DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\{Str};
use Image;

class dashboardcontroller extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function check_if_admin() {
        if(Auth::check() && Auth::user()->hasRole('admin')) {
            return true;
        }
        return false;
    }
    public function index() {
        if(Auth::check() && Auth::user()->hasRole('editor')) {
            return redirect()->route('editor.index');
        } else if(Auth::check() && Auth::user()->hasRole('user')) {
            return redirect()->route('users.index');
        } else {
            $blogs = Blog::get()->count();
            $users = User::role('user')->get()->count();
            $events = Event::orderBy('id', 'desc')->get();
            return view('dashboard.admin.index', compact('blogs', 'events', 'users'));
        }        
    }
    public function users() {
        if($this->check_if_admin() == false) return redirect()->back();
        $users = User::whereNotIn('id',[1])->with('roles')->get();
        return view('dashboard.admin.users', compact('users'));
    }
    public function account() {
        $user = auth()->user();
        return view('dashboard.edit_profile', compact('user'));
    }
    public function update_account(Request $request, $id) {
        $this->validate($request, [
            'mobile' => 'required|digits:10',
            'fname' => 'required',
            'lname' => 'required',
            'password' => 'required',
        ]);
        User::where('id', base64_decode($id))->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'mobile' => $request->mobile,
            'id_no' => $request->id_no,
            'password' => Hash::make($request->password)
        ]);
        Session::flash('info', 'Account updated successfully.');
        return redirect()->route('dashboard.index');
    }
    public function suspend_user($id) {
        if($this->check_if_admin() == false) return redirect()->back();
        $user = User::where('id', base64_decode($id))->update([
            'suspend' => Carbon::now()
        ]);
        Session::flash('success', 'User suspended.');
        return redirect()->back();
    }
    public function unsuspend_user($id) {
        if($this->check_if_admin() == false) return redirect()->back();
        $user = User::where('id', base64_decode($id))->update([
            'suspend' => null
        ]);
        Session::flash('success', 'User unsuspended.');
        return redirect()->back();
    }
    public function add_editor(Request $request) {
        if($this->check_if_admin() == false) return redirect()->back();
        $this->validate($request, [
            'email' => 'required|unique:users',
            'fname' => 'required',
            'lname' => 'required',
            'mobile' => 'required | digits:10'
        ]);
        $password = strtoupper(substr($request->fname, 0, 2).mt_rand(1000,9999));
        DB::transaction(function() use($request,$password) {
            $user_data = [
                'fname' => $request->fname,
                'lname' => $request->lname,
                'mobile' => '254'.substr($request->mobile, -9),
                'id_no' => $request->id_no,
                'email' => $request->email,
                'password' => Hash::make($password),
            ];
            $new_user = User::create($user_data);

            if($request->role == 0) {
                $role = Role::find(2);
                $permissions = [2];
                $role->syncPermissions($permissions);
                $new_user->assignRole([$role->id]);
            } else {
                $role = Role::find(1);
                $permissions = [1,2];
                $role->syncPermissions($permissions);
                $new_user->assignRole([$role->id]);
            }

            $message = Message::where('code', 'INVITE')->first()->body;
            $message = str_replace('%email%', $new_user->email, $message);
            $message = str_replace('%password%', $password, $message);
            $message = str_replace('%link%', config('app.url'), $message);
            $message = str_replace('%break%', "\r\n", $message);

            $dispatch = ['mobile' => $new_user->mobile, 'message' => $message];
            SendSms::dispatch($dispatch)->delay(Carbon::now()->addSeconds(3));
        });
        Session::flash('success', 'Editor added.');
        return redirect()->back();
    }
    public function categories() {
        if($this->check_if_admin() == false) return redirect()->back();
        $categories = Category::withCount('blogs')->get();
        $tags = Tag::get();
        return view('dashboard.admin.categories', compact('categories','tags'));
    }
    public function add_category(Request $request) {
        if($this->check_if_admin() == false) return redirect()->back();
        Category::create(['name'=>$request->name]);
        Session::flash('success', 'Category added.');
        return redirect()->back();
    }
    public function add_tag(Request $request) {
        if($this->check_if_admin() == false) return redirect()->back();
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:tags',
        ], [
            'name.required' => 'Tag name is required',
            'name.unique' => 'Oops, tag already exists'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'cood')->withInput();
        }
        Tag::create(['name'=>strtoupper($request->name)]);
        Session::flash('success', 'Tag added.');
        return redirect()->back();
    }
    public function suspend_cat($id) {
        $cat = Category::find(base64_decode($id));
        $cat->is_active = false;
        $cat->save();
        Session::flash('success', 'Category suspended.');
        return redirect()->back();
    }
    public function view_blog($id) {
        $user = Auth::user();
        if($user->hasRole('user')) return redirect()->back();
        $blog = Blog::with(['category','tags'])->find(base64_decode($id));
        return view('dashboard.view_blog', compact('blog'));
    }
    public function unsuspend_cat($id) {
        $cat = Category::find(base64_decode($id));
        $cat->is_active = true;
        $cat->save();
        Session::flash('success', 'Category unsuspended.');
        return redirect()->back();
    }
    public function blogs() {
        $user = Auth::user();
        if($user->hasRole('admin')) {
            $blogs = Blog::orderBy('id','desc')->with(['category', 'tags'])->get();
        } else {
            $blogs = Blog::orderBy('id','desc')->where('user_id', $user->id)->with(['category', 'tags'])->get();
        }
        return view('dashboard.blogs', compact('blogs'));
    }
    public function add_blog() {
        $user = Auth::user();
        if($user->hasRole('user')) return redirect()->back();
        $categories = Category::where('is_active', true)->get();
        $tags = Tag::get();
        return view('dashboard.add_blog', compact('categories','tags'));
    }
    public function post_blog(Request $request) {
        $user = Auth::user();
        if($user->hasRole('user')) return redirect()->back();
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        $slug = Str::slug($request->title, '-');

        if($request->hasFile('image')){
            $filename = u25_compressImage($request->file('image'));
            $filename_ = NULL;
        }

        if($request->hasFile('video')) {
            $filename_ = u25_compressVideo($request->file('video'));
            $filename = NULL;
        }

        $data = [
            'user_id' => $user->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'body' => strip_tags($request->description),
            'schedule_date' => $request->schedule_date,
            'slug' => $slug,
            'image' => $filename,
            'video' => $filename_
        ];
        DB::transaction(function() use($data,$request) {
            $blog = Blog::create($data);
            $blog->tags()->sync($request->tags);
        });
        Session::flash('success', 'Blog added.');
        return redirect()->route('admins.blogs');
    }
    public function post_edit_blog(Request $request, $id) {
        $user = Auth::user();
        if($user->hasRole('user')) return redirect()->back();
        $blog = Blog::find(base64_decode($id));
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $slug = Str::slug($request->title, '-');

        if($request->hasFile('image')){
            $filename = u25_compressImage($request->file('image'));
            $filename_ = NULL;
            unlink(public_path().'/Images/'.$blog->image);
        } else {
            $filename = $blog->image;
        }

        if($request->hasFile('video')) {
            $filename_ = u25_compressVideo($request->file('video'));
            $filename = NULL;
            unlink(public_path().'/Videos/'.$blog->video);
        } else {
            $filename_ = $blog->video;
        }

        $data = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'body' => strip_tags($request->description),
            'schedule_date' => $request->schedule_date,
            'slug' => $slug,
            'image' => $filename,
            'video' => $filename_
        ];
        $blog->update($data);
        Session::flash('success', 'Blog edited.');
        return redirect()->route('admins.blogs');
    }
    public function blog_edit($id) {
        $blog = Blog::find(base64_decode($id));
        $categories = Category::where('is_active', true)->get();
        $tags = Tag::get();
        return view('dashboard.edit_blog', compact('blog','categories','tags'));
    }
    public function blog_verify($id) {
        if($this->check_if_admin() == false) return redirect()->back();
        $blog = Blog::with('category')->find(base64_decode($id));
        $blog->verified = true;
        $blog->save();
        Session::flash('success', 'Blog verified.');
        return redirect()->back();
    }
    public function blog_unverify($id) {
        if($this->check_if_admin() == false) return redirect()->back();
        $blog = Blog::find(base64_decode($id));
        $blog->verified = false;
        $blog->save();
        Session::flash('success', 'Blog unverified.');
        return redirect()->back();
    }
    public function add_event(Request $request) {
        // if($this->check_if_admin() == false) return redirect()->back();
        $user = Auth::user();
        if($user->hasRole('user')) return redirect()->back();
        if($user->hasRole('editor')) {
            $is_active = false;
        } else {
            $is_active = true;
        }
        $this->validate($request, [
            'name' => 'required|unique:events',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'description' => strip_tags($request->description),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'image' => u25_compressImage($request->file('image')),
            'is_active' => $is_active,
        ];
        Event::create($data);
        Session::flash('success', 'Event added.');
        return redirect()->route('dashboard.index');
    }
    public function view_event($id) {
        $user = Auth::user();
        if($user->hasRole('user')) return redirect()->back();
        $event = Event::find(base64_decode($id));
        return view('dashboard.admin.view_event', compact('event'));
    }
    public function sms() {
        if($this->check_if_admin() == false) return redirect()->back();
        $smses = Message::get();
        return view('dashboard.admin.sms', compact('smses'));
    }
    public function edit_sms(Request $request, $id) {
        if($this->check_if_admin() == false) return redirect()->back();
        $sms = Message::find(base64_decode($id));
        $sms->body = $request->body;
        $sms->save();
        Session::flash('success', 'Message edited.');
        return redirect()->back();
    }
    public function approve_event($id) {
        if($this->check_if_admin() == false) return redirect()->back();
        $event = Event::find($id);
        $event->is_active = true;
        $event->save();
        Session::flash('success', 'Event Approved.');
        return redirect()->back();
    }
    public function hold_event($id) {
        if($this->check_if_admin() == false) return redirect()->back();
        $event = Event::find($id);
        $event->is_active = false;
        $event->save();
        Session::flash('success', 'Event Approved.');
        return redirect()->back();
    }
}
