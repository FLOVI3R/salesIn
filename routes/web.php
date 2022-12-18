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
Route::post('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::middleware(['auth', 'verified', 'active', 'admin'])->group(function () {
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::post('activateUser{id}', 'AdminController@activateUser')->name('activateUser');
    Route::post('deactivateUser{id}', 'AdminController@deactivateUser')->name('deactivateUser');
    Route::post('deleteUser{id}', 'AdminController@deleteUser')->name('deleteUser');
    Route::get('updateUser{id}', 'AdminController@updateUser')->name('updateUser');
    Route::post('editUser{id}', 'AdminController@editUser')->name('editUser');
    Route::get('articles', 'AdminController@articles')->name('articles');
    Route::get('createArticle', 'AdminController@createArticle')->name('createArticle');
    Route::post('addArticle', 'AdminController@addArticle')->name('addArticle');
    Route::get('updateArticle{id}', 'AdminController@updateArticle')->name('updateArticle');
    Route::post('editArticle{id}', 'AdminController@editArticle')->name('editArticle');
    Route::post('deleteArticle{id}', 'AdminController@deleteArticle')->name('deleteArticle');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth', 'verified', 'deleted');
