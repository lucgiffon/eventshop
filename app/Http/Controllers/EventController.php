<?php

namespace App\Http\Controllers;

use Validator;
use Excel;
use View;
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

        $eventsMostPopular = Event::where('isactive', 1)->with('participant')->get()->sortBy(function($eventsMostPopular)
        {
            return $eventsMostPopular->participant->count();
        }, SORT_REGULAR, true)->take(3);


        $eventsOurSelection = Event::where('isactive', 1)->where('selected', 1)->get();


        $eventsNewest = Event::where('isactive', 1)->orderBy('id', 'DESC')->take(4)->get();

        return view('home', ['eventsArray_MostPopular' => $eventsMostPopular,
                            'eventsArray_OurSelection' => $eventsOurSelection,
                            'eventsArray_Newest' => $eventsNewest]);
    }

    public function listEvent()
    {
        $eventsShowAll = Event::where('isactive', 1)->with('eventpicture')->paginate(15);

        return view('listEvent', ['eventsShowAll' => $eventsShowAll]);
    }

    public function index($id)
    {
        if (Event::whereId($id)->pluck('isactive') == 1) {
            $event = Event::whereId($id)->first();
            $genders = Gender::lists('name', 'id');
            $expertises = Expertise::lists('name', 'id');
            $countries = Country::lists('short_name', 'id');

            return view('event', ['event' => $event, 'genders' => $genders, 'expertises' => $expertises, 'countries' => $countries,]);
        }

        abort(404);
    }

    public function getEventWithId($id)
    {
        return Event::find($id);
    }

    public function postForm(Request $request)
    {

            if ($request->isMethod('post')) {
            /* Validation des données */

            $v1 = Validator::make(['event' => $request->input('event')], ['event' => 'required|numeric|exists:Event,id,isactive,1']);

            if ($v1->fails()) {
                return response()->json(array(
                    'error' => $v1->messages()
                ), 422); // 422 being the HTTP code for an Unprocessable Entity.
            }

            $event = Event::whereId($request->input('event'))->first();
            $tomorrow = date('Y-m-d', strtotime('tomorrow UTC'));

            if($tomorrow > date('Y-m-d', strtotime($event->enddate))) {
                return response()->json(array(
                    'error' => "L'événement est terminé."
                ), 422); // 422 being the HTTP code for an Unprocessable Entity.
            }

            else if($tomorrow > date('Y-m-d', strtotime($event->begindate)))
                $begin_date = date('Y-m-d', strtotime('today UTC'));
            else
                $begin_date = date('Y-m-d', strtotime($event->begindate));

            $rules = [
                'gender' => 'required|exists:Gender,id',
                'expertise' => 'required|exists:Expertise,id',
                'country' => 'required|exists:Country,id',

                'lastname' => 'required|max:255|alpha_dash',
                'firstname' => 'required|max:255|alpha_dash',
                'mail' => 'required|email', //|unique:participant,email TODO: A VOIR AVEC LES AUTRES
                'phone' => 'required|numeric',
                'address' => 'required|max:255',
                'department' => 'required|max:255'
            ];

            $dates = $request->input('dates');

            if(isset($dates))
                foreach($dates as $key => $val)
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

            if(isset($dates))
                foreach($dates as $key => $val)
                {
                    // sanitizing the date field
                    $date = preg_replace("([^0-9/])", "", $val);
                    $eat = new Eat(['date' => date('Y-m-d', strtotime(str_replace('/', '-', $date)))]);
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
