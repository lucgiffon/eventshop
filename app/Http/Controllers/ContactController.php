<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use DB;
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
        $filters = array(
            'nom'   => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'email' => FILTER_SANITIZE_EMAIL,
            'texte' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );

         if ($request->isMethod('post')) {
                 $rules =  [
                     'nom' => 'required|max:255',
                     'email' =>'required|max:255',
                     'texte' => 'required'
                 ];
             $v1 = Validator::make($request->except('id'), $rules);

             if ($v1->fails()) {
                 return response()->json(array(
                     'error' => $v1->messages()
                 ), 422); // 422 being the HTTP code for an Unprocessable Entity.
             }

             $sanitizedInput = filter_var_array($request->input(), $filters);

             $id = DB::table('Message')->insertGetId([
                     'name' => $sanitizedInput['nom'],
                     'email' => $sanitizedInput['texte'],
                     'description' => $sanitizedInput['texte']
                 ]);

            // $returned =  DB::table('Message')->where('id', 118)->value('description');

         //return $returned;
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
