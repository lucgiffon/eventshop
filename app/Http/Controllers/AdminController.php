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
use Storage;

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

        if(!file_exists($pathToFile)){
            echo ' Erreur : Vérifier que l\'attestation a bien été générée';
            die();
        }

        return response()->download($pathToFile);
    }

    public function downloadAttestationZip($ids)
    {
        if(file_exists(storage_path('zip/attestations.zip')))
            unlink(storage_path('zip/attestations.zip'));

        $zipper = new \Chumper\Zipper\Zipper;
        $zipper->make(storage_path('zip/attestations.zip'));

        $attestations = explode(',', $ids);

        //dd($attestations);

        $zipEmpty = 1;

        foreach($attestations as $attestation)
        {
            if(file_exists(base_path('/storage/exports/attestation_' . $attestation . '.pdf')))
            {
                $zipper->add(storage_path('exports/attestation_' . $attestation . '.pdf'));
                $zipEmpty = 0;
            }
        }

        if($zipEmpty) {
            echo ' Erreur : Vérifier que les attestations ont bien été générées';
            die();
        }

        $zipper->make(storage_path('zip/attestations.zip'));
        $zipper->close();

        $pathToFile = storage_path('zip/attestations.zip');

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