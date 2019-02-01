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

// Public Routes
Route::get('/', 'FrontController@index')->name('main');
Route::get('/about', 'FrontController@about')->name('about');
Route::get('/services', 'FrontController@services')->name('services');
Route::get('/portfolio', 'FrontController@portfolio')->name('portfolio');
Route::get('/contact', 'FrontController@contact')->name('contact');
Route::get('/contact', 'FrontController@contactStore')->name('contact.store');
Route::get('/blog', 'FrontController@blog')->name('blog');
Route::get('/blog/{id}', 'FrontController@blog')->name('blog.show');
// Route::get('/home', 'HomeController@index')->name('home');

// Backend Routes
Auth::routes(['verify' => true]);

Route::group(['prefix' => 'bsd-admin', 'middleware' => ['role:superadministrator|administrator', 'verified']], function() {

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
    Route::resource('/expences', 'ExpencesController');
});