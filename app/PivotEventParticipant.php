<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PivotEventParticipant extends Model
{
    protected $table = "event_participant";

    protected $fillable = [
        'participant_id',
        'event_id'
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