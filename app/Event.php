<?php

namespace App;

use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\SleepingOwlModel;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Event extends SleepingOwlModel implements ModelWithImageFieldsInterface
{
    protected $table = "event";

    use ModelWithImageOrFileFieldsTrait;

    protected $fillable = [
        'titre',
        'logo',
        'begindate',
        //'enddate',
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
            'logo' => '' // rajouter le path des images chargés sur le site
        ];
    }

    public function getDates()
    {
        return array_merge(parent::getDates(), ['begindate']);
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