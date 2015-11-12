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

    /*
    public function country()
    {
        return $this->belongsTo('Country');
    }

    public function companies()
    {
        return $this->belongsToMany('Company');
    }

    public function getFullNameAttribute()
    {
        return implode(' ', [
            $this->firstName,
            $this->lastName
        ]);
    }

    public function setCompaniesAttribute($companies)
    {
        $this->companies()->detach();
        if ( ! $companies) return;
        if ( ! $this->exists) $this->save();
        $this->companies()->attach($companies);
    }
    */
}
