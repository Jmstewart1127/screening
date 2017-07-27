<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Positions;

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

    public function store()
    {
        $position = new Positions;

        $position->businessName = request('businessName');
        $position->positionName = request('positionName');
        $position->screening = request('screening');

        $position->save();

        return view('positions.index');
    }

//    public function show($id)
//    {
//        $positions = Positions::find($id);
//        return view('positions.show', array('positions' => $positions));
//    }

}
