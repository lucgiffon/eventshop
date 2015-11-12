<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Event;
use App\EventSelected;

class EventController extends Controller
{
    public function home()
    {
        $eventsMostPopular = Event::All(); // A REFAIRE QUAND LA TABLE DES PARTICIPANTS AURA ETE SIDEE PAR LUC

        $idEventSelected = EventSelected::All();
        $eventsOurSelection = Event::findMany($idEventSelected);

        $eventsNewest = Event::orderBy('id', 'DESC')->take(4)->get();

        return view('home', ['eventsArray_MostPopular' => $eventsMostPopular,
                            'eventsArray_OurSelection' => $eventsOurSelection,
                            'eventsArray_Newest' => $eventsNewest]);

    }

    public function listEvent()
    {
        $eventsShowAll = Event::paginate(15);

        return view('listEvent', ['eventsShowAll' => $eventsShowAll]);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
