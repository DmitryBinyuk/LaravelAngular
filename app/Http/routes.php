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

//Route::get('/', ['as' => 'front.home', 'uses' => 'HomeController@index']);

Route::get('employees', 'API1\EmployeesController@index');

//Route::group(['prefix' => 'v1', 'namespace' => 'Api1'], function () {
////    Route::get('/', function () {
////	return view('index');
////    });
//
//    Route::get('employees', 'EmployeesController@index');
////    Route::post('employees', 'Employees@store');
////    Route::post('employees/{id}', 'Employees@update');
////    Route::delete('/employees/{id}', 'Employees@destroy');
//});
