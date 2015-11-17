<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = "Gender";

    protected $fillable = [
        'name'
    ];

    public $timestamps = true;

//    protected $hidden = [
//        'created_at',
//        'updated_at'
//    ];

    function Participant()
    {
        return $this->hasMany('App\Participant');
    }
}