<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Positions;
use App\Business;

class BusinessController extends Controller
{

    public function index()
    {
        return view('business.index');
    }

    public function create()
    {
        return view('business.create');
    }

    /*
 * Stores new entry and decides
 * whether screening is required
 *
 * */
    public function store()
    {
        $business = new Business;

        $business->businessName = request('businessName');

        $business->save();

        return view('business.create');
    }

    public function show()
    {
        $business = Business::all();

        return view('business.show', compact('business'));
    }

    public function showPositions($id)
    {
        $positions = Positions::where('businessId', '=', $id)->get();

        $business = Business::where('id', '=', $id)->get();

        return view('business.showbybusinessid')
            ->with('positions', $positions)
            ->with('business', $business);
    }
}
