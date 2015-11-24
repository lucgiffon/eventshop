<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Participant
 *
 * @property integer $id
 * @property string $email
 * @property integer $gender_id
 * @property string $lastname
 * @property string $firstname
 * @property integer $expertise_id
 * @property string $phonenumber
 * @property string $address
 * @property string $department
 * @property string $country
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $event
 * @property-read \App\Gender $gender
 * @property-read \App\Expertise $expertise
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereGenderId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereLastname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereFirstname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereExpertiseId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant wherePhonenumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereDepartment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereCountry($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereUpdatedAt($value)
 */
class Participant extends Model
{
    protected $table = "participant";

    protected $fillable = [
        'email',
        'lastname',
        'firstname',
        'phonenumber',
        'address',
        'department'
    ];

    public $timestamps = true;

//    protected $hidden = [
//        'created_at',
//        'updated_at'
//    ];

    public function event()
    {
        return $this->belongsToMany('App\Event');
    }

    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }

    public function expertise()
    {
        return $this->belongsTo('App\Expertise');
    }

    public function eat()
    {
        return $this->hasMany('App\Eat');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function setEventAttribute($event)
    {
        $this->event()->detach();

        if(!$event)
            return;

        if(!$this->exists)
            $this->save();

        $this->event()->attach($event);
    }
}