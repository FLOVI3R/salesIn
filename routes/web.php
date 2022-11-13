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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::post('activateUser{id}', 'AdminController@activateUser')->name('activateUser');
    Route::post('deactivateUser{id}', 'AdminController@deactivateUser')->name('deactivateUser');
    Route::post('deleteUser{id}', 'AdminController@deleteUser')->name('deleteUser');
    Route::post('updateUser{id}', 'AdminController@updateUser')->name('updateUser');
    Route::post('editUser{id}', 'AdminController@editUser')->name('editUser');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth', 'verified');
