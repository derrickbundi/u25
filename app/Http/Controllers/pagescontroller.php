<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Event,Blog,Category,BlogTag};

class pagescontroller extends Controller
{
    public function index() {
        $blogs = Blog::orderBy('id','desc')->where([['verified', true],['status', true]])->limit(5)->get();
        $active = Blog::where('active',true)->with('category')->first();
        $event = Event::orderBy('id','desc')->where('is_active',true)->first();
        $events = Event::orderBy('id','desc')->where('is_active',true)->limit(5)->get();
        $entre = Blog::where('category_id', 1)->where([['verified', true],['status', true]])->limit(2)->get();
        $ids = [];
        foreach($entre as $data) {
            array_push($ids, $data->id);
        }
        $entres = Blog::whereNotIn('id', $ids)->where('category_id', 1)->where([['verified', true],['status', true]])->limit(3)->get();
        $talents = Blog::where('video','!=',null)->orderBy('id','desc')->with('category')->limit(3)->get();
        $ids = [];
        $data = Category::where('is_active',true)->withCount('home_blogs')->get();
        foreach($data as $category) {
            if($category->home_blogs_count != 0) {
                array_push($ids, $category->id);
            }
        }
        $categories = Category::whereIn('id',$ids)->with('home_blogs')->limit(4)->inRandomOrder()->get();
        $entres = Blog::where('category_id', 1)->where([['verified', true],['status', true]])->with('tags')->limit(3)->get();
        return view('index', compact('blogs','event','active','events','entre','talents','categories','entres'));
    }
    public function category($category) {
        $cat = Category::where('name', $category)->first();
        $blogs = Blog::where('category_id', $cat->id)->orderBy('id','desc')->where([['verified', true],['status', true]])->with('tags')->paginate(5);
        $events = Event::orderBy('id','desc')->where('is_active',true)->limit(4)->with('category')->get();
        $ids = [];
        foreach($blogs as $blog) {
            array_push($ids,$blog->id);
        }
        $four = Blog::whereNotIn('id',$ids)->orderBy('id','desc')->where([['verified', true],['status', true]])->limit(4)->with('category')->get();
        $categories = Category::where('is_active',true)->withCount('blogs')->get();
        return view('pages.category', compact('cat','blogs','events','four','categories'));
    }
    public function single_blog($category,$year,$month,$slug) {
        $blog = Blog::where('slug', $slug)->with(['category','tags'])->first();
        $cat = Category::where('name',$category)->first();
        $others = Blog::whereNotIn('id',[$blog->id])->where('category_id',$cat->id)->limit(6)->with('category')->get();
        $events = Event::orderBy('id','desc')->where('is_active',true)->limit(4)->with('category')->get();
        $categories = Category::where('is_active',true)->withCount('blogs')->get();
        $four = Blog::whereNotIn('id',[$blog->id])->orderBy('id','desc')->where([['verified', true],['status', true]])->limit(4)->with('category')->get();
        return view('pages.single_blog', compact('blog','others','categories','events','four'));
    }
    /**
     * Operations
     */
    public function end_event() {
        $date = Carbon::yesterday();
        $events = Event::where('is_active', true)->whereDate('ends_in', $date)->get();
        foreach($events as $event) {
            $event->update(['is_active', false]);
        }
    }
}
