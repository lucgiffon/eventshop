<?php

namespace App;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "Event";

/*
    public function eventPictures()
    {
        return $this->hasMany('App\Eventpicture');
    }
*/
}
