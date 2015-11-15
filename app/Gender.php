<?php

namespace App;

use SleepingOwl\Models\SleepingOwlModel;

class Gender extends SleepingOwlModel
{
    protected $table = "gender";

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    function Participant()
    {
        return $this->hasMany('App\Participant');
    }
}