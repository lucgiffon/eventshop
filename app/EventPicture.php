<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPicture extends Model
{
    protected $table = "eventpicture";

    protected $fillable = [
        'picture',
        'event_id',
        'isprincipal'
    ];

    public $timestamps = true;

//    protected $hidden = [
//        'created_at',
//        'updated_at'
//    ];

    public function getImageFields()
    {
        return [
            'picture' => ''
        ];
    }

    public function event()
    {
        return $this->belongsTo('\App\Event');
    }
}
