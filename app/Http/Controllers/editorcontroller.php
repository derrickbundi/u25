<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\{Event};

class editorcontroller extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function check_if_editor() {
        if(Auth::check() && Auth::user()->hasRole('editor')) {
            return true;
        }
        return false;
    }
    public function index() {
        if($this->check_if_editor() == false) return redirect()->back();
        $events = Event::orderBy('id', 'desc')->get();
        return view('dashboard.editor.index',compact('events'));
    }
}
