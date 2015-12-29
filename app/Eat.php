<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eat extends Model
{
    protected $table = "Eat";

    protected $fillable = [
        'event_id',
        'participant_id',
        'date'
    ];

    public $timestamps = true;

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function participant()
    {
        return $this->belongsTo('App\Participant');
    }
}