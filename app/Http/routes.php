<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/get-todos', 'ItemController@index');
Route::post('/create-todos', 'ItemController@store');
Route::put('/update-todos/{id}', 'ItemController@update');
Route::put('/update-todos', 'ItemController@updateMultiple');
Route::delete('/delete-todos/{id}', 'ItemController@destroy');
Route::delete('/delete-todos', 'ItemController@destroyMultiple');