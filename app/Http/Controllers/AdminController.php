<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Event;
use App\Participant;

class AdminController extends Controller
{
    public function home()
    {
        $eventCount = Event::count();
        $participantCount = Participant::count();

        return view('admin.index', ['eventCount' => $eventCount, 'participantCount' => $participantCount]);
    }

    public function getSecond()
    {
        $method = str_replace('::', '@', __METHOD__);

        return view('admin.second', compact('method'));
    }

    public function getThird()
    {
        $method = str_replace('::', '@', __METHOD__);

        return view('admin.second', compact('method'));
    }
}