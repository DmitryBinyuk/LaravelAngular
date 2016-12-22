<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
    return View::make('frontend.store');
});

Route::get('/phones', function () {
    return view('phones.list');
});

Route::get('/phone/{phoneId}', function () {
    return view('phones.detail');
});

/*****************************************************************************/
/*   API routes
/*****************************************************************************/

Route::group(['prefix' => 'api/v1'], function () {

    Route::get('phone', 'API1\PhonesController@index');
    Route::get('phoner/{phoneId}', 'API1\PhonesController@show');

});

//Routes for learning
Route::get('/store', ['as' => 'front.store', 'uses' => 'HomeController@index']);

//redirect to frontend
Route::any('{catchall}', function() {
    return View::make('frontend.store');
})->where('catchall', '.*');