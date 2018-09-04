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
Auth::routes();
Route::get('/', 'WelcomeUserController@index');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/rooms-list', 'RoomsController@getList');
Route::post('login', 'Auth\LoginController@login');
	
Route::get('/admin/mailbox','AdminController@getMailbox');
Route::get('/admin/calendar', 'CalendarController@getCalendar');
Route::get('/admin/payments/b_invoice', 'AdminController@getPayment_b');
Route::get('/admin/users-cards', 'AdminController@getCards');
Route::get('/admin/users-list', 'AdminController@getList');
Route::get('/admin/user-profile/{id}', 'AdminController@getProfile');


//perfiles propios
Route::post('/admin/avatar', 'AdminController@postUpdateAvatar');

Route::get('/user/index', 'UserController@index')->name('user');
	
Route::get('/admin/rooms-cards', 'RoomsController@getCards');
Route::get('/admin/passengers-list', 'PassengersController@getList');
Route::get('/admin/passenger-profile/{id}', 'PassengersController@getProfile');
Route::get('/admin/passengers-cards', 'PassengersController@getCards');
Route::get('/admin/reservations-list', 'ReservationController@getList');
Route::post('/disp', 'WelcomeUserController@postDisp');

Route::get('/user/my-profile/{id}', 'ProfileController@getMyProfile');