<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Positions;
use App\Ratings;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class PositionsController extends Controller
{
    public function index()
    {
        return view('positions.index');
    }

    public function create()
    {
        return view('positions.create');
    }

    /*
     * Stores new entry and decides
     * whether screening is required
     *
     * */
    public function store()
    {
        $screening = Input::get('screening');

        if ($screening == 'true') {
            $result = true;
        } else {
            $result = false;
        }

        $position = new Positions;

        $position->businessName = request('businessName');
        $position->positionName = request('positionName');
        $position->screening = $result;

        $position->save();

        return view('positions.index');
    }

    public function show()
    {
        $positions = Positions::all();

        return view('positions.show', compact('positions'));
    }

    public function thumbUp($id)
    {
        $positions = Positions::where('id', '=', $id)->value('businessId');

        DB::table('positions')
            ->where('id', $id)
            ->increment('rating', 1);

        return redirect('business/show/'.$positions);
    }

    public function newPosition()
    {
        return view('positions.create');
    }

    public function saveNewPosition($id)
    {
        $screening = Input::get('screening');

        if ($screening == 'true') {
            $result = true;
        } else {
            $result = false;
        }

        $position = new Positions;

        $position->businessId = $id;
        $position->positionName = request('positionName');
        $position->screening = $result;

        $position->save();

        return redirect('business/show/'.$id);
    }

}
