<?php

namespace App;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Database\Eloquent\Model;

class Event extends Eloquent
{
    protected $table = "Event";

/*
    public function eventPictures()
    {
        return $this->hasMany('App\Eventpicture');
    }
*/
}
