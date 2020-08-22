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
// Route::get('/video', function () {
//     return view('video-testing');
// });

Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::post('/answers/{exam}', 'HomeController@answers')->name('takeExam');
});

/**
 * Dashboard routes.
 */
Route::group(['prefix' => 'control-panel/', 'namespace' => 'Dashboard', 'middleware' => ['role:admin', 'dashboard']], function () {
    Route::get('/', 'UserController@index')->name('dashboard.index');
    Route::get('home', 'UserController@index')->name('dashboard.home');
    Route::resource('users', 'UserController');
    Route::resource('exams', 'ExamController');
    Route::get('grades', 'GradeController@index')->name('dashboard.grades.index');
    Route::get('grades/export/', 'GradeController@export')->name('dashboard.grades.export');
});
