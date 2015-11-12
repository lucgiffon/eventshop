<?php

namespace App;

use SleepingOwl\Models\SleepingOwlModel;

class Participant extends SleepingOwlModel
{
    protected $table = "participant";

    protected $fillable = [
        'email',
        'idgender',
        'lastname',
        'firstname',
        'idexpertise',
        'phonenumber',
        'address',
        'department',
        'country'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}