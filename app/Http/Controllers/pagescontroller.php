<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Event};

class pagescontroller extends Controller
{
    public function index() {
        return view('index');
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
