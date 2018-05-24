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


Route::get('/users', 'UserController@index');

Route::get('/users/{id}', function ($id){
	//comillas dobles permiten concatenar el elemento id
	return "Showing user details: {$id}";
});