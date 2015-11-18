<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Event_Participant
 *
 * @property integer $participant_id
 * @property integer $event_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Event_Participant whereParticipantId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event_Participant whereEventId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event_Participant whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event_Participant whereUpdatedAt($value)
 */
class Event_Participant extends Model
{
    protected $table = "event_participant";

    public $timestamps = true;
}
