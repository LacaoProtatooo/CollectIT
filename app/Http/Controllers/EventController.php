<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function events(){
        $user = Auth::user();
        $events = Event::All();

        return view('admin.events', compact('events'));
    }
}
