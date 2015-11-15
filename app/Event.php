<?php

namespace App;

use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\SleepingOwlModel;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;

class Event extends SleepingOwlModel implements ModelWithImageFieldsInterface
{
    protected $table = "Event";

    use ModelWithImageOrFileFieldsTrait;

    protected $fillable = [
        'title',
        'logo',
        'begindate',
        'enddate',
        'address',
        'mailcontact',
        'description'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

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
