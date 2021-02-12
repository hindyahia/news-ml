<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::redirect('/', '/home');
Route::namespace('Admin')
    //->prefix('admin')
    ->name('admin.')->group(function () {
    //->middleware('auth')
    Route::get('/home', 'AppController@index')->name('home');
    Route::get('/edit-profile', 'UserController@editProfile')->name('edit-profile');
    Route::post('/edit-profile', 'UserController@updateProfile');
    Route::get('/edit-password', 'UserController@editPassword')->name('edit-password');
    Route::post('/edit-password', 'UserController@updatePassword');

    Route::post('/changeStatus/{model}', 'AppController@changeStatus');
    Route::resource('users', 'UserController');
    Route::resource('admins', 'AdminsController')->parameters([
        'admins' => 'user',
    ]);
    Route::resource('contents', 'ContentController');
    Route::resource('categories', 'CategoryController');
    Route::resource('keywords', 'KeywordController');
    Route::post('Keywords/reset/{Keyword}', 'KeywordController@resetKeywords')->name('Keywords.reset');
    Route::resource('blocked-keywords', 'BlockedKeywordController');
});
