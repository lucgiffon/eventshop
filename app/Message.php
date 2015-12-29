<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'Message';

    protected $fillable = [
        'name',
        'email',
        'descripion'
    ];

    public $timestamps = true;

    public function event()
    {
        return $this->hasOne('App\Event');
    }

//    protected $hidden = [
//        'created_at',
//        'updated_at'
//    ];

}
