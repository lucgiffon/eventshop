<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Expertise
 *
 * @property integer $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Participant[] $Participant
 * @method static \Illuminate\Database\Query\Builder|\App\Expertise whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Expertise whereName($value)
 */
class Expertise extends Model
{
    protected $table = "Expertise";

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