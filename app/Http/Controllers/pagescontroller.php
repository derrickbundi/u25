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
        return view('index', compact('blogs','event','active','events','entre','talents','categories'));
    }
    public function cat() {
        return view('pages.category');
    }
    public function cat_() {
        return view('pages.category_');
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
