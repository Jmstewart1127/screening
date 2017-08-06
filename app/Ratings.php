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
        'userId', 'positionId', 'hasRated'
    ];

    public function positions()
    {
        return $this->hasMany('App\Positions');
    }

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function newRating($userId, $positionId)
    {
        $rated = Ratings::where([
            ['userId', '=', $userId],
            ['positionId', '=', $positionId]
        ])->get();

        if ($rated) {
            echo "nope";
        }
        else {
            $rating = New Ratings;

            $rating->positionId = $positionId;
            $rating->userId = $userId;
            $rating->hasRated = true;

            $rating->save();
        }
    }
}
