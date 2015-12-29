<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Event
 *
 * @property integer $id
 * @property string $title
 * @property string $logo
 * @property \Carbon\Carbon $begindate
 * @property \Carbon\Carbon $enddate
 * @property string $address
 * @property string $mailcontact
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Participant[] $participant
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereLogo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereBegindate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereEnddate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereMailcontact($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereSelected($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereUpdatedAt($value)
 */
class Event extends Model
{
    protected $table = 'Event';

    protected $fillable = [
        'id',
        'title',
        'logo',
        'begindate',
        'enddate',
        'address',
        'mailcontact',
        'description',
        'selected',
        'isActive'
    ];

    public $timestamps = true;

//    protected $hidden = [
//        'created_at',
//        'updated_at'
//    ];

    public function message()
    {
        return $this->hasOne('App\Message');
    }

    public function participant()
    {
        return $this->belongsToMany('App\Participant');
    }

    public function eventPicture()
    {
        return $this->hasMany('App\EventPicture');
    }

    public function eat()
    {
        return $this->hasMany('App\Eat');
    }

    public function getImageFields()
    {
        return [
            'logo' => ''
        ];
    }

    public function getDates()
    {
        return array_merge(parent::getDates(), ['begindate', 'enddate']);
    }
}
