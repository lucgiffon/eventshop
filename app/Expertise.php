<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    protected $table = "Expertise";

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    function Participant()
    {
        return $this->hasMany('App\Participant', 'expertise_id');
    }
}