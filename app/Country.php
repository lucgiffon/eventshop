<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "Country";

    protected $fillable = [
        'title',
        'iso2',
        'short_name',
        'long_name',
        'iso3',
        'numcode',
        'un_member',
        'calling_code',
        'cctld'
    ];

    public $timestamps = true;

//    protected $hidden = [
//        'created_at',
//        'updated_at'
//    ];

    public function participant()
    {
        return $this->belongsToMany('App\Participant');
    }
}
