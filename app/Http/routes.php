<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'EventController@home');
Route::get('listEvent', 'EventController@listEvent');
Route::get('contact', 'ContactController@home');
Route::get('event/{id}', 'EventController@index');
Route::post('postFormContact', 'ContactController@postForm');
Route::post('postFormEvent', 'EventController@postForm');

Route::get('downloadAttestation/{fileId}',
    'AdminController@downloadAttestation'
);