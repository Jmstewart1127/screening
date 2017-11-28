<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Task;
use Illuminate\Http\Request;

    Route::resource('positions', 'PositionsController');

    Route::resource('business', 'BusinessController');

    Route::resource('user', 'AuthController');

    Route::get('business/show/{id}', 'BusinessController@showPositions');

    Route::get('positions/create/{id}', 'PositionsController@newPosition');

    Route::post('positions/create/{id}', 'PositionsController@saveNewPosition');

    Route::get('business/delete/{id}', 'BusinessController@destroy');


Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/', 'HomeController@index');

    Route::get('/home', 'HomeController@index');

    Route::resource('positions', 'PositionsController');

    Route::resource('business', 'BusinessController');

    Route::resource('user', 'AuthController');

    Route::post('rating/vote/{id}', 'RatingsController@thumbUp');

    Route::get('business/show/{id}', 'BusinessController@showPositions');

    Route::get('business/delete/{id}', 'BusinessController@destroy');

    Route::post('positions/vote/{id}', 'PositionsController@thumbUp');

    Route::get('positions/create/{id}', 'PositionsController@newPosition');

    Route::post('positions/create/{id}', 'PositionsController@saveNewPosition');

});
