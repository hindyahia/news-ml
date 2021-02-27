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
//Route::redirect('/', '/home');
Route::namespace('Admin')
    //->prefix('admin')
    ->name('admin.')->middleware('auth')->group(function () {
        //->middleware('auth')
        Route::get('/home', 'AppController@index')->name('home');
        Route::get('users/edit-profile', 'UserController@editProfile')->name('users.edit-profile');
        Route::patch('users/edit-profile', 'UserController@updateProfile');
        Route::get('users/edit-password/{user}', 'UserController@editUserPassword')->name('users.edit-password');
        Route::patch('users/edit-password/{user}', 'UserController@updateUserPassword');

        Route::post('/changeStatus/{model}', 'AppController@changeStatus');

        Route::middleware('adminMiddleware')->group(function () {

            Route::resource('users', 'UserController');
            Route::resource('admins', 'AdminsController')->parameters([
                'admins' => 'user',
            ]);
            Route::resource('blocked-keywords', 'BlockedKeywordController');
            Route::resource('categories', 'CategoryController');

        });

        Route::resource('contents', 'ContentController');
        Route::get('getCustomNewsToKeyword', 'ContentController@getCustomNewsToKeyword')->name('getCustomNews');
        Route::resource('keywords', 'KeywordController');
        Route::post('Keywords/reset/{Keyword}', 'KeywordController@resetKeywords')->name('Keywords.reset');
    });

Route::get('/', 'WebSite\HomeController@index')->name('website.home');
Route::get('post/{id}', 'WebSite\HomeController@single_post');
Route::get('category/{id}', 'WebSite\HomeController@category');
Route::get('bloger/search', 'WebSite\HomeController@search');
