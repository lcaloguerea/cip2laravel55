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

Route::get('/admin', function () {
    return view('admin/index');
});

Route::get('/admin/mailbox', function () {
    return view('mail/mailbox');
});

Route::get('/admin/users-cards', 'UserController@getCards');
Route::get('/admin/users-list', 'UserController@getList');
Route::get('/admin/user-profile/{id}', 'UserController@getProfile');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
