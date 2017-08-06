<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Positions;
use App\User;

class Ratings extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId', 'positionId', 'hasRated', 'rating'
    ];

    public function positions()
    {
        return $this->hasMany('App\Positions');
    }

    public function user()
    {
        return $this->hasMany('App\User');
    }

}
