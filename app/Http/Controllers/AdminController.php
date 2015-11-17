<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Event;
use App\Participant;
use Admin;

class AdminController extends Controller
{
    public function home()
    {
        $eventCount = Event::count();
        $participantCount = Participant::count();

        $content = view('admin.index', ['eventCount' => $eventCount, 'participantCount' => $participantCount]);

        return Admin::view($content, 'Accueil');
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