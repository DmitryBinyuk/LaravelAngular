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

//Authentfication routes
Route::post('api/register', 'TokenAuthController@register');
Route::post('api/authenticate', 'TokenAuthController@authenticate');
Route::get('api/authenticate/user', 'TokenAuthController@getAuthenticatedUser');

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
    Route::get('phone/{phoneId}', 'API1\PhonesController@show');

    Route::get('comment/{phoneId}', 'API1\CommentsController@index');
    Route::post('comment', 'API1\CommentsController@store');

    Route::get('brands', 'API1\PhonesController@brands');

});

//Routes for learning
Route::get('/store', ['as' => 'front.store', 'uses' => 'HomeController@index']);

//redirect to frontend
Route::any('{catchall}', function() {
    return View::make('frontend.store');
})->where('catchall', '.*');