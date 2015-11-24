<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Country
 *
 * @property integer $id
 * @property string $title
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereName($value)
 */
class Country extends Model
{
    protected $table = "country";

    protected $fillable = [
        'id',
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
