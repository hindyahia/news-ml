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
Route::redirect('/', '/admin');
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    //->middleware('auth')
    Route::get('/', 'AppController@index')->name('home');
    Route::post('/changeStatus/{model}', 'AppController@changeStatus');
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
});
