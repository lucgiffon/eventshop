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
        $args = array(
            'name'   => FILTER_SANITIZE_ENCODED,
            'component'    => array('filter'    => FILTER_VALIDATE_INT,
                'flags'     => FILTER_REQUIRE_ARRAY,
                'options'   => array('min_range' => 1, 'max_range' => 10)
            ),
            'email'     => FILTER_SANITIZE_ENCODED,
            'texte' => FILTER_SANITIZE_ENCODED,
            'testscalar'   => array(
                'filter' => FILTER_VALIDATE_INT,
                'flags'  => FILTER_REQUIRE_SCALAR,
            ),
            'testarray'    => array(
                'filter' => FILTER_VALIDATE_INT,
                'flags'  => FILTER_REQUIRE_ARRAY,
            )

        );
         if ($request->isMethod('post')) {
                 $this->validate($request, [
                     'nom' => 'required|max:255',
                     'email' =>'required',
                     'texte' => 'required'
                 ]);

             $id = DB::table('Message')->insertGetId([
                     'name' => $request->input('nom'),
                     'email' => $request->input('email'),
                     'description' => $request->input('texte')
                 ]);

             $message = new Message;

             $message->name = $request->input('nom');
             $message->email = $request->input('email');
             $message->description = htmlspecialchars($request->input('texte'));

             $message->save();

             $returned =  DB::table('Message')->where('id', 110)->value('description');

//             $message = new Message([
//                 'name' => $request->input('nom'),
//                 'email' => $request->input('email'),
//                 'description' => $request->input('texte')
//             ]);

             return var_dump($request->input());
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
