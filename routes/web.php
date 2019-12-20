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

Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('validate', 'Auth\RegisterController@getValidate');
	
Route::get('/admin/mailbox','AdminController@getMailbox');
Route::get('/admin/calendar', 'CalendarController@getCalendar');
Route::get('/admin/payments/b_invoice', 'AdminController@getPayment_b');
Route::get('/admin/users/cards', 'AdminController@getCards')->name('usersCards');
Route::get('/admin/users/list', 'AdminController@getList')->name('usersList');
Route::get('/admin/users/user-profile/{id}', 'AdminController@getProfile');

Route::get('/admin/generate-pdf','AdminController@generatePDF');
Route::get('/admin/payments/invoices-list','AdminController@getInvoicesList')->name('invoiceList');
Route::get('/admin/payments/invoice-detail/{id}','AdminController@getInvoiceDetail');
Route::get('/admin/payments/upload', 'AdminController@getUploadInvoice');
Route::post('/admin/payments/invoice-upload', 'AdminController@postUploadInvoice');
Route::put('/admin/invoice-update', 'AdminController@putUpdateInvoice');
Route::get('/admin/supplies', 'AdminController@getSupplies')->name('supplies');
Route::get('/admin/maintenance', 'MaidController@getMaintenance')->name('maintenance');

//maid routes
Route::get('/maid/supplies', 'MaidController@getSupplies')->name('supplies');
Route::get('/maid/maintenance', 'MaidController@getMaintenance')->name('maintenance');
Route::post('/maid/supplies-alert', 'MaidController@postSuppliesAlert');
Route::post('/maid/supplies-res', 'MaidController@postSuppliesRes');
Route::post('/maid/supplies-alert-all', 'MaidController@postSuppliesAlertAll');
Route::post('/maid/supplies-res-all', 'MaidController@postSuppliesResAll');
Route::post('/maid/alert-m', 'MaidController@postAlertM');
Route::post('/maid/validate-m', 'MaidController@postvalidateM');
Route::get('/maid/rooms-list', 'RoomsController@getList');
Route::get('/maid/rooms-cards', 'RoomsController@getCards');
Route::get('/maid/room-detail/{id}', 'RoomsController@getRoomDetail');
Route::get('/maid/reservations-list', 'ReservationController@getList');
Route::post('/maid/reservations/update', 'ReservationController@postReservationUpdate')->name('updateReservation');
Route::put('/maid/reservations/invoice', 'ReservationController@putReservationInvoice')->name('reservationInvoice');
Route::put('/maid/reservations/checkin', 'ReservationController@putReservationCheckin')->name('checkin');
Route::put('/maid/reservations/confirm', 'ReservationController@putReservationConfirm')->name('confirm');
Route::put('/maid/reservations/checkout', 'ReservationController@putReservationCheckout')->name('chekout');
Route::put('/maid/reservations/cancel', 'ReservationController@putReservationCancel')->name('cancel');
Route::get('/maid/reservations/reservation-detail/{id}', 'ReservationController@getReservationDetail');


//perfiles propios

Route::get('my-profile', 'ProfileController@getMyProfile');

Route::post('/admin/avatar', 'ProfileController@postUpdateAvatar');
Route::post('/user/avatar', 'ProfileController@postUpdateAvatar');
Route::post('/maid/avatar', 'ProfileController@postUpdateAvatar');
Route::post('/admin/passenger/avatar', 'AdminController@postUpdatePassengerAvatar');

Route::get('/user', 'UserController@index')->name('user');
Route::get('/user/passengers-list', 'UserController@getMyPassengers')->name('myPassengers');
Route::get('/user/passenger-profile/{id}', 'UserController@getPassengerProfile');
Route::post('/user/passenger/avatar', 'UserController@postUpdatePassengerAvatar');

Route::get('register/verify/{confirmationCode}', 'Auth\RegisterController@confirm');

Route::get('/user/my-reservations/list', 'UserController@getMyReservations')->name('my-reservations');
Route::post('/user/my-reservations/make_reservation', 'UserController@postMakeReserv')->name('reservation');
Route::post('/user/validate_guest', 'UserController@postValidateGuest');
Route::post('/user/load-guest', 'UserController@postLoadGuest');
Route::post('/user/load-guest2', 'UserController@postLoadGuest2');
Route::post('/user/create-reservation', 'UserController@postCreateReservation');
Route::post('/user/fetch', 'UserController@postFetch')->name('fetch');
	
Route::get('/admin/rooms-cards', 'RoomsController@getCards');
Route::get('/admin/room-detail/{id}', 'RoomsController@getRoomDetail');
Route::post('/admin/room-sanitization', 'RoomsController@postRoomSanitization');
Route::post('/admin/room-locked', 'RoomsController@postRoomlocked');
Route::post('/admin/room-unlocked', 'RoomsController@postRoomUnlocked');
Route::get('/admin/passengers/list', 'PassengersController@getList');
Route::get('/admin/passengers/passenger-profile/{id}', 'PassengersController@getProfile');
Route::get('/admin/passengers/cards', 'PassengersController@getCards');
Route::get('/admin/reservations-list', 'ReservationController@getList');
Route::post('/admin/reservations/update', 'ReservationController@postReservationUpdate')->name('updateReservation');
Route::put('/admin/reservations/invoice', 'ReservationController@putReservationInvoice')->name('reservationInvoice');
Route::put('/admin/reservations/checkin', 'ReservationController@putReservationCheckin')->name('checkin');
Route::put('/admin/reservations/confirm', 'ReservationController@putReservationConfirm')->name('confirm');
Route::put('/admin/reservations/checkout', 'ReservationController@putReservationCheckout')->name('chekout');
Route::put('/admin/reservations/cancel', 'ReservationController@putReservationCancel')->name('cancel');
Route::get('/admin/reservations/reservation-detail/{id}', 'ReservationController@getReservationDetail');
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

//testimonials
Route::get('testimonial/{confirmationCode}', 'TestimonialController@getTestimonial');
Route::post('testimonial/save', 'TestimonialController@postTestimonialSave')->name('testimonial.save');

Route::group(['middleware' => 'Admin'], function(){
	Route::get('/admin', 'AdminController@index')->name('admin');
	Route::get('/admin/rooms-list', 'RoomsController@getList');
	Route::get('/admin/testimonials', 'AdminController@getTestimonials');
	Route::post('/admin/testimonial/updateV', 'AdminController@postUpdateTestimonialV');
});

Route::group(['middleware' => 'Maid'], function(){
	Route::get('/maid', 'MaidController@index')->name('maid');
});