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

Route::get('/', ['as' => 'front.home', 'uses' => 'StoreController@index']);



Route::get('phones/list', 'API1\PhonesController@index');

Route::get('/phones', function () {
    return view('phones.list');
});

/*****************************************************************************/
/*   API routes
/*****************************************************************************/

Route::group(['prefix' => 'api/v1'], function () {

    Route::get('phones/list', 'API1\PhonesController@index');

});

//Routes for learning
Route::get('/store', ['as' => 'front.store', 'uses' => 'HomeController@index']);