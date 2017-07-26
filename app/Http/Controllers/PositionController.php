<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    /*
     * Display index page
     */
    public function index()
    {
        return view('positions.index');
    }

    /*
     * Show form to create new entry
     */
    public function create()
    {
        //
    }


}
