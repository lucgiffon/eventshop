<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Eat;
use App\Event;
use App\Gender;
use App\Expertise;
use App\Country;
use App\Participant;

class EventController extends Controller
{
    public function home()
    {
        //$eventsMostPopular = Event::orderBy('id', 'ASC')->take(3)->get(); // A REFAIRE QUAND LA TABLE DES PARTICIPANTS AURA ETE SEED PAR LUC

        $eventsMostPopular = Event::with('participant')->get()->sortBy(function($eventsMostPopular)
        {
            return $eventsMostPopular->participant->count();
        }, SORT_REGULAR, true)->take(3);

        $eventsOurSelection = Event::where('selected', 1)->get();

        $eventsNewest = Event::orderBy('id', 'DESC')->take(4)->get();

        return view('home', ['eventsArray_MostPopular' => $eventsMostPopular,
                            'eventsArray_OurSelection' => $eventsOurSelection,
                            'eventsArray_Newest' => $eventsNewest]);
    }

    public function listEvent()
    {
        $eventsShowAll = Event::with('eventpicture')->paginate(15);

        return view('listEvent', ['eventsShowAll' => $eventsShowAll]);
    }

    public function index($id)
    {
        $event = Event::whereId($id)->first();
        $genders = Gender::lists('name', 'id');
        $expertises = Expertise::lists('name', 'id');
        $countries = Country::lists('short_name', 'id');

        return view('event', ['event' => $event, 'genders' => $genders, 'expertises' => $expertises, 'countries' => $countries,]);
    }

    public function postForm(Request $request)
    {
        if ($request->isMethod('post')) {
            /* Validation des données */

            $v1 = Validator::make(['event' => $request->input('event')], ['event' => 'required|numeric|exists:event,id,isactive,1']);

            if ($v1->fails()) {
                return response()->json(array(
                    'error' => $v1->messages()
                ), 422); // 422 being the HTTP code for an Unprocessable Entity.
            }

            $event = Event::whereId($request->input('event'))->first();
            $tomorrow = date('d/m/Y', strtotime('tomorrow UTC'));

            if($tomorrow > date('d/m/Y', strtotime($event->enddate))) {
                return response()->json(array(
                    'error' => "L'événement est terminé."
                ), 422); // 422 being the HTTP code for an Unprocessable Entity.
            }
            else if($tomorrow > date('d/m/Y', strtotime($event->begindate)))
                $begin_date = date('d/m/Y', strtotime('today UTC'));
            else
                $begin_date = date('d/m/Y', strtotime($event->begindate));

            $rules = [
                'gender' => 'required|exists:gender,id',
                'expertise' => 'required|exists:expertise,id',
                'country' => 'required|exists:country,id',

                'lastname' => 'required|max:255',
                'firstname' => 'required|max:255',
                'mail' => 'required|email', //|unique:participant,email TODO: A VOIR AVEC LES AUTRES
                'phone' => 'required|numeric',
                'address' => 'required|max:255',
                'department' => 'required|max:255'
            ];

            foreach($request->input('dates') as $key => $val)
            {
                $rules['dates.' . $key] = 'date_format:"d/m/Y"|before:' . $event->enddate . '|after:' . $begin_date;
            }

            $v2 = Validator::make($request->except('id'), $rules);

            if ($v2->fails()) {
                return response()->json(array(
                    'error' => $v2->messages()
                ), 422); // 422 being the HTTP code for an Unprocessable Entity.
            }

            /* Ajout des données */
            $participant = new Participant([
                'email' => $request->input('mail'),
                'lastname' => $request->input('lastname'),
                'firstname' => $request->input('firstname'),
                'phonenumber' => $request->input('phone'),
                'address' => $request->input('address'),
                'department' => $request->input('department')
            ]);

            $gender = Gender::whereId($request->input('gender'))->first();
            $expertise = Expertise::whereId($request->input('expertise'))->first();
            $country = Country::whereId($request->input('country'))->first();

            $participant->gender()->associate($gender);
            $participant->expertise()->associate($expertise);
            $participant->country()->associate($country);

            $event->participant()->save($participant);

            foreach($request->input('dates') as $key => $val)
            {
                $eat = new Eat(['date' => date('Y-m-d', strtotime(str_replace('/', '-', $val)))]);
                $eat->participant()->associate($participant);
                $eat->event()->associate($event);
                $eat->save();
            }
        }
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
