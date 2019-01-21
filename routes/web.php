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

Auth::routes();

Route::group(['prefix' => 'bsd-admin', 'middleware' => ['role:superadministrator|administrator|editor|contributor|author']], function() {

    Route::get('/', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@dashboard')->name('bsd-admin.dashboard');
    Route::resource('/user', 'UsersController');
    Route::resource('/permissions', 'PermissionsController', ['except' => 'destroy']);
});

Route::get('/home', 'HomeController@index')->name('home');
