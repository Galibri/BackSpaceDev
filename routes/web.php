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

Route::group(['prefix' => 'bsd-admin', 'middleware' => ['role:superadministrator|administrator|editor|contributor|author', 'verified']], function() {

    Route::get('/', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@dashboard')->name('bsd-admin.dashboard');
    Route::resource('/user', 'UsersController');
    Route::resource('/permissions', 'PermissionsController', ['except' => 'destroy']);
    Route::resource('/roles', 'RolesController');
    Route::resource('/posts', 'PostsController');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/clients', 'ClientsController');
    Route::resource('/projects', 'ProjectsController');
    Route::resource('/files', 'FilesController');
});

Route::get('/verify/{token}', 'VerifyController@verifyEmail')->name('user.email.verify');

Route::get('/home', 'HomeController@index')->name('home');
