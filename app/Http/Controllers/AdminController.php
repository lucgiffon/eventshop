<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Event;
use App\Expertise;
use App\Gender;
use App\EventPicture;
use App\Eat;
use App\Participant;
use Admin;

class AdminController extends Controller
{
    public function home()
    {
        $eventCount = Event::count();
        $participantCount = Participant::count();
        $pictureCount = EventPicture::count();
        $eatCount = Eat::count();

        $expertises = Expertise::all();
        $participantsByExpertiseCount = [];

        foreach ($expertises as $expertise) {
            $participantByExpertiseCount['count'] = $expertise->Participant()->count();
            $participantByExpertiseCount['name'] = $expertise->name;

            $participantsByExpertiseCount[] = $participantByExpertiseCount;
        }

        $genres = Gender::all();
        $participantsByGenderCount = [];

        foreach ($genres as $genre) {
            $participantByGenderCount['count'] = $genre->Participant()->count();
            $participantByGenderCount['name'] = $genre->name;

            $participantsByGenderCount[] = $participantByGenderCount;
        }

        $content = view('admin.index', ['eventCount' => $eventCount,
                                        'participantCount' => $participantCount,
                                        'participantsByExpertiseCount' => $participantsByExpertiseCount,
                                        'participantsByGenderCount' => $participantsByGenderCount,
                                        'pictureCount' => $pictureCount,
                                        'eatCount' => $eatCount]);

        return Admin::view($content, 'Accueil');
    }

    public function downloadAttestation($fileId)
    {
        $pathToFile = storage_path() . "/exports/attestation_" . $fileId . ".pdf";

        return response()->download($pathToFile);
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