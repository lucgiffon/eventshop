<?php

namespace App;

use SleepingOwl\Models\SleepingOwlModel;

class Participate extends SleepingOwlModel
{
    protected $table = "participate";

    protected $fillable = [
        'participant_id',
        'event_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}