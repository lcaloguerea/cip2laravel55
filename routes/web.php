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

Route::get('/admin/calendar', function () {
    return view('calendar/index');
});

Route::get('/admin/payments/b_invoice', function () {
    return view('payments/b_invoice');
});

Route::get('/admin/users-cards', 'UserController@getCards');
Route::get('/admin/users-list', 'UserController@getList');
Route::get('/admin/user-profile/{id}', 'UserController@getProfile');

Route::get('/admin/rooms-list', 'RoomsController@getList');
Route::get('/admin/rooms-cards', 'RoomsController@getCards');

Route::get('/admin/passengers-list', 'PassengersController@getList');
Route::get('/admin/passenger-profile/{id}', 'PassengersController@getProfile');
Route::get('/admin/passengers-cards', 'PassengersController@getCards');


Auth::routes();


