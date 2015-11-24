<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Gender
 *
 * @property integer $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Participant[] $Participant
 * @method static \Illuminate\Database\Query\Builder|\App\Gender whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Gender whereName($value)
 */
class Gender extends Model
{
    protected $table = "gender";

    protected $fillable = [
        'id',
        'name'
    ];

    public $timestamps = true;

//    protected $hidden = [
//        'created_at',
//        'updated_at'
//    ];

    function Participant()
    {
        return $this->hasMany('App\Participant');
    }
}