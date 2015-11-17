<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "Event";

    protected $fillable = [
        'title',
        'logo',
        'begindate',
        'enddate',
        'address',
        'mailcontact',
        'description'
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

    public static function getList()
    {
        return static::lists('title', 'id');
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
