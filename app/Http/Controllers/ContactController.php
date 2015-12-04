<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                 $this->validate($request, [
                     'nom' => 'required|max:255',
                     'email' =>'required|max:255',
                     'texte' => 'required'
                 ]);

             $sanitizedInput = filter_var_array($request->input(), $filters);

             $id = DB::table('Message')->insertGetId([
                     'name' => $sanitizedInput['nom'],
                     'email' => $sanitizedInput['texte'],
                     'description' => $sanitizedInput['texte']
                 ]);

             $returned =  DB::table('Message')->where('id', 118)->value('description');

         return $returned;
        }
//        return "coucou";
//        if(Request::ajax()) {
//            $data = Input::all();
//            print_r($data);
//            die;
//        }
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
