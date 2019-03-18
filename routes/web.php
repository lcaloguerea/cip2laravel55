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
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('validate', 'Auth\RegisterController@getValidate');
	
Route::get('/admin/mailbox','AdminController@getMailbox');
Route::get('/admin/calendar', 'CalendarController@getCalendar');
Route::get('/admin/payments/b_invoice', 'AdminController@getPayment_b');
Route::get('/admin/users/cards', 'AdminController@getCards')->name('usersCards');
Route::get('/admin/users/list', 'AdminController@getList')->name('usersList');
Route::get('/admin/users/user-profile/{id}', 'AdminController@getProfile');

//maid routes
Route::get('/maid', 'MaidController@index')->name('maid');
Route::get('/maid/supplies', 'MaidController@getSupplies');

//perfiles propios

Route::get('my-profile', 'ProfileController@getMyProfile');

Route::post('/admin/avatar', 'AdminController@postUpdateAvatar');

Route::get('/user', 'UserController@index')->name('user');

Route::get('register/verify/{confirmationCode}', 'Auth\RegisterController@confirm');

Route::post('/user/make_reservation', 'UserController@postMakeReserv')->name('reservation');
Route::post('/user/validate_guest', 'UserController@postValidateGuest');
Route::post('/user/load-guest', 'UserController@postLoadGuest');
Route::post('/user/load-guest2', 'UserController@postLoadGuest2');
Route::post('/user/create-reservation', 'UserController@postCreateReservation');
Route::post('/user/fetch', 'UserController@postFetch')->name('fetch');
	
Route::get('/admin/rooms-cards', 'RoomsController@getCards');
Route::get('/admin/room-detail/{id}', 'RoomsController@getRoomDetail');
Route::get('/admin/passengers/list', 'PassengersController@getList');
Route::get('/admin/passengers/passenger-profile/{id}', 'PassengersController@getProfile');
Route::get('/admin/passengers/cards', 'PassengersController@getCards');
Route::get('/admin/reservations-list', 'ReservationController@getList');
Route::post('/disp', 'WelcomeUserController@postDisp');
Route::post('/admin/user-destroy', 'AdminController@postUserDestroy');

//profieles maintaining the route for their respective roles
Route::get('/admin/my-profile', 'ProfileController@getMyProfile');
Route::get('/user/my-profile', 'ProfileController@getMyProfile');
Route::get('/maid/my-profile', 'ProfileController@getMyProfile');

Route::put('/profile/update', 'ProfileController@putUpdate')->name('profileUpdate');
Route::put('/admin/user/update', 'AdminController@putUserUpdate')->name('adminUserUpdate');

//trying emails responsives views
Route::get('/emails/welcome', 'EmailController@getWelcome');