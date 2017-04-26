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

/*****************************************************************************/
/*   Admin routes
/*****************************************************************************/

Route::group(['namespace' => 'Admin\Controllers', 'prefix' => 'admin'], function () {

    // Dashboard
    Route::get('dashboard', 'DashboardController@getIndex')->name('dashboard');

    // Users
    Route::get('users', 'UsersController@getIndex')->name('users');
    Route::get('users/{userId}', 'UsersController@getEdit')->name('users.edit');
    Route::post('users/{userId}', 'UsersController@postUpdate')->name('users.update');


});

Route::get('/', function() {
    return View::make('frontend.store');
});

Route::get('/profile', function() {
    return View::make('frontend.profile');
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

Route::group(['prefix' => 'api/v1', 'namespace' => 'API1\Controllers'], function () {

    Route::get('phone', 'PhonesController@index');
    Route::get('phone/{phoneId}', 'PhonesController@show');
    Route::get('brands', 'PhonesController@brands');

    Route::get('comment/{phoneId}', 'CommentsController@index');
    Route::post('comment', 'CommentsController@store');
    Route::delete('comment/{commentId}', 'CommentsController@destroy');

    Route::post('profile', 'ProfileController@update');

    Route::post('feebback/createq', 'FeedbackController@create');

    //Authentfication routes
    Route::post('register', 'TokenAuthController@register');
    Route::post('authenticate', 'TokenAuthController@authenticate');
    Route::get('authenticate/user', 'TokenAuthController@getAuthenticatedUser');

});

//Routes for learning
Route::get('/store', ['as' => 'front.store', 'uses' => 'HomeController@index']);

//redirect to frontend
Route::any('{catchall}', function() {
    return View::make('frontend.store');
})->where('catchall', '.*');