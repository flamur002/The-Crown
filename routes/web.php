<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\EnquiriesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\RoomPricesController;
use App\Http\Controllers\BookingsController;
use Illuminate\Http\Request;
use App\Mail\RegisterMail;



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

Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/contact', [PagesController::class, 'contact']);
Route::POST('/contact', [EnquiriesController::class, 'AddEnquiry']);
Route::get('/login', [PagesController::class, 'login']);
Route::get('/register', [PagesController::class, 'register']);
Route::post('/quote', [PagesController::class, 'quotes']);
Route::get('/standard', [PagesController::class, 'standard']);
Route::get('/deluxe', [PagesController::class, 'deluxe']);
Route::get('/family', [PagesController::class, 'family']);



Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/customer', [UsersController::class, 'customerDashboard'])->middleware('customer');
Route::get('/mybookings', [BookingsController::class, 'mybookings'])->middleware('customer');
Route::get('/cancel/mybooking/{id}', [BookingsController::class, 'cancelMyBooking'])->middleware('customer');
Route::post('/cancel/mybooking/{id}', [BookingsController::class, 'cancel'])->middleware('customer');
Route::get('/mybookings/cancelled', [BookingsController::class, 'myCancelledBookings'])->middleware('customer');
Route::get('/myaccount', [UsersController::class, 'account'])->middleware('auth');
Route::get('/myaccount/edit', [UsersController::class, 'editAccount'])->middleware('auth');
Route::post('/myaccount/edit', [UsersController::class, 'updateAccount'])->middleware('auth');
Route::post('/myaccount/delete', [UsersController::class, 'deleteAccount'])->middleware('auth');
Route::post('/confirm', [BookingsController::class, 'summary'])->middleware('auth');
Route::post('/pay', [PaymentsController::class, 'pay'])->middleware('auth');
Route::post('/book', [BookingsController::class, 'book'])->name('book')->middleware('auth');



Route::get('/dashboard', [UsersController::class, 'dashboard'])->middleware('staff_or_admin');
Route::get('/admin/admins', [UsersController::class, 'admins'])->middleware('admin');
Route::get('/admin/customers', [UsersController::class, 'customers'])->middleware('admin');
Route::get('/admin/staff', [UsersController::class, 'staff'])->middleware('admin');
Route::get('/delete/user/{id}', [UsersController::class, 'deleteUser'])->middleware('admin');
Route::get('/admin/addUser/{role}', [UsersController::class, 'addUser'])->middleware('admin');
Route::post('/admin/addUser', [UsersController::class, 'storeUser'])->middleware('admin');
Route::get('/admin/editUser/{id}', [UsersController::class, 'editUser'])->middleware('admin');
Route::post('/admin/editUser/{id}', [UsersController::class, 'updateUser'])->middleware('admin');
Route::get('/admin/addStaff', [UsersController::class, 'addStaff'])->middleware('admin');
Route::get('/managerooms', [RoomsController::class, 'view'])->middleware('admin');
Route::get('/addRoom', [RoomsController::class, 'addRoom'])->middleware('admin');
Route::post('/addRoom', [RoomsController::class, 'saveRoom'])->middleware('admin');
Route::post('/deleteRoom', [RoomsController::class, 'deleteRoom'])->middleware('admin');
Route::get('/editPrices', [RoomPricesController::class, 'edit'])->middleware('admin');
Route::post('/editPrices', [RoomPricesController::class, 'update'])->middleware('admin');
Route::get('/enquiries', [EnquiriesController::class, 'enquiries'])->middleware('staff_or_admin');
Route::get('/completeEnquiry/{id}', [EnquiriesController::class, 'complete'])->middleware('staff_or_admin');
Route::get('/completedEnquiries', [EnquiriesController::class, 'completedEnquiries'])->middleware('staff_or_admin');
Route::get('/checkin', [BookingsController::class, 'checkInBookings'])->middleware('staff_or_admin');
Route::get('/checkout', [BookingsController::class, 'checkOutBookings'])->middleware('staff_or_admin');
Route::get('/checkin/{id}', [BookingsController::class, 'checkIn'])->middleware('staff_or_admin');
Route::get('/checkout/{id}', [BookingsController::class, 'checkOut'])->middleware('staff_or_admin');
Route::get('/bookings', [BookingsController::class, 'bookings'])->middleware('staff_or_admin');
Route::get('/previousBookings', [BookingsController::class, 'previousBookings'])->middleware('staff_or_admin');
Route::get('/cancelledBookings', [BookingsController::class, 'cancelledBookings'])->middleware('staff_or_admin');
Route::get('/booking/{id}', [BookingsController::class, 'bookingDetails'])->middleware('staff_or_admin');
Route::get('/cancel/{id}', [BookingsController::class, 'cancelBooking'])->middleware('staff_or_admin');
Route::post('/cancel/{id}', [BookingsController::class, 'cancel'])->middleware('staff_or_admin');





