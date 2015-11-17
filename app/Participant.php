<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = "Participant";

    protected $fillable = [
        'email',
        'lastname',
        'firstname',
        'phonenumber',
        'address',
        'department',
        'country'
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
}