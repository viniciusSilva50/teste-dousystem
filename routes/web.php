<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', 'HomeController@index')->name('activity.list');

Route::prefix('activity')->group(function () {
    Route::get('list', 'ActivityController@list')->name('activity.list');
    Route::get('create', 'ActivityController@create')->name('activity.create');
    Route::post('save', 'ActivityController@Save')->name('activity.save');
});