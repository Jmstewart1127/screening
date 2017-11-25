<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Ratings;
use App\Positions;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RatingsController extends Controller
{
    /**
     * Checks if user has already rated a position
     * Increments the rating by one if not rated
     * Else, increment by 0 (rating does nothing)
     **/
    public function thumbUp($id)
    {
        $userId = Auth::user()->id;

        $rated = Ratings::where([
            ['userId', '=', $userId],
            ['positionId', '=', $id],
            ['hasRated', '=', true]
        ])->get();

        if ($rated->count()) {
            DB::table('positions')
                ->where('id', $id)
                ->increment('rating', 0);
        }
        else {
            $rating = New Ratings;

            $rating->positionId = $id;

            $rating->userId = $userId;
            
            $rating->hasRated = true;

            $rating->save();

            DB::table('positions')
                ->where('id', $id)
                ->increment('rating', 1);
        }

        $positions = Positions::where('id', '=', $id)->value('businessId');

        return redirect('business/show/'.$positions);
    }
}
