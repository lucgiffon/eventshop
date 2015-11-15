<?php

namespace App;

use SleepingOwl\Models\SleepingOwlModel;

class Expertise extends SleepingOwlModel
{
    protected $table = "expertise";

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    function Participant()
    {
        return $this->hasMany('App\Participant', 'expertise_id');
    }
}