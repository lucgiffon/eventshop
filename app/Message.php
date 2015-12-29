<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'Message';

    protected $fillable = [
        'name',
        'email',
        'description'
    ];

    public $timestamps = true;

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

//    protected $hidden = [
//        'created_at',
//        'updated_at'
//    ];

}
