<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use DB;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Message;

class ContactController extends Controller
{
    public function home() {
        return view('contact');
    }

    public function postForm(Request $request)
    {

         if ($request->isMethod('post')) {
                 $rules =  [
                     'nom' => 'required|max:255|regex:^[a-zA-Z0-9\-\_\'\;\:\!\§\?\$\+\=\&\(\)\[\] ]+$^',
                     'email' =>'required|max:255|email',
                     'texte' => 'required|regex:^[a-zA-Z0-9\-\_\'\;\:\!\§\?\$\+\=\&\(\)\[\] ]+$^',
                     'eventName' => 'max:255|alpha_dash',
                     'eventAddr' => 'max:255|regex:^[a-zA-Z0-9\-\_\'\;\:\!\§\?\$\+\=\&\(\)\[\] ]+$^',
                     'eventBeginDate' => 'date_format:"d/m/Y"',
                     'eventEndDate' => 'date_format:"d/m/Y"',
                     'eventDescr' => 'regex:^[a-zA-Z0-9\-\_\'\;\:\!\§\?\$\+\=\&\(\)\[\] ]+$^',
                     'eventPicture' => 'image'
                 ];


                $v1 = Validator::make($request->except('id'), $rules);

             if ($v1->fails()) {

                 return response()->json(array(
                     'error' => $v1->messages()
                 ), 422); // 422 being the HTTP code for an Unprocessable Entity.
             }


             $imagePath = null;


             if (null !== Input::file('eventPicture') && Input::file('eventPicture')->isValid()) {
                 $destinationPath = 'images/uploads_tmp'; // upload path
                 $extension = Input::file('eventPicture')->getClientOriginalExtension(); // getting image extension
                 $fileName = date('jYhis') . rand(11111,99999) . '.' . $extension; // renameing image
                 Input::file('eventPicture')->move($destinationPath, $fileName); // uploading file to given path
                 $imagePath = $destinationPath . '/' . $fileName;
             }


             $id_event = DB::table('Event')->insertGetId([
                 'title' => $request->input('eventName'),
                 'logo' => $imagePath,
                 'beginDate' =>  date('Y-m-d', strtotime(str_replace('/', '-', $request->input('eventBeginDate')))),
                 'endDate' =>  date('Y-m-d', strtotime(str_replace('/', '-', $request->input('eventEndDate')))),
                 'address' => $request->input('eventAddr'),
                 'mailcontact' => $request->input('email'),
                 'description' => $request->input('eventDescr'),
                 'selected' => 0,
                 'isactive' => 0

             ]);

             $id = DB::table('Message')->insertGetId([
                     'name' => $request->input('nom'),
                     'email' => $request->input('texte'),
                     'description' => $request->input('texte'),
                     'event_id' => $id_event
                 ]);

        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
