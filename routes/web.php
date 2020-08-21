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

/**
 * Auth routes
 */
Auth::routes();

/**
 * Website routes.
 */
Route::get('/', function () {
    return view('home');
});

Route::get('/video', function () {
    return view('video-testing');
});

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Dashboard routes.
 */
Route::group(['prefix' => 'control-panel/', 'namespace' => 'Dashboard', 'middleware' => ['role:admin']], function () {
    Route::get('/', 'UserController@index')->name('dashboard.index');
    Route::get('home', 'UserController@index')->name('dashboard.home');
    Route::resource('users', 'UserController');

    Route::get('test', function () {
        return view('dashboard.test');
    });
});
