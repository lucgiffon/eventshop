<?php

namespace App;

use SleepingOwl\Models\SleepingOwlModel;

class Gender extends SleepingOwlModel
{
    protected $table = "Gender";

    protected $fillable = [
        'name'
    ];

    public $timestamps = true;

//    protected $hidden = [
//        'created_at',
//        'updated_at'
//    ];

    function Participant()
    {
        return $this->hasMany('App\Participant');
    }
}