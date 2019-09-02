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

Route::resources([
    'clients' => 'ClientController',
    'users' => 'UserController',
    ]);

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/search','UserController@search');
