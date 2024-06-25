<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuperAdmin\SuperAdminController; // use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cek-reservasi', [HomeController::class, 'cekReservasi'])->name('cek-reservasi');
Route::get('/kebijakan', [HomeController::class, 'kebijakan'])->name('kebijakan');
Route::get('/tentang-kami', [HomeController::class, 'tentangKami'])->name('tentang-kami');

// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');


Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
Route::get('/trips/create', [TripController::class, 'create'])->name('trips.create');
Route::post('/trips', [TripController::class, 'store'])->name('trips.store');
Route::get('/trips/{id}/edit', [TripController::class, 'edit'])->name('trips.edit');
Route::put('/trips/{id}', [TripController::class, 'update'])->name('trips.update');

Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
// Rute untuk menampilkan formulir pemesanan
Route::get('/booking', [BookingController::class, 'showBookingForm'])->name('booking.form');
Route::post('/booking', [BookingController::class, 'storeBooking'])->name('booking.store');
Route::get('/booking/success', [BookingController::class, 'showSuccessPage'])->name('booking.success');


Route::middleware(['auth', 'admin'])->group(function () {
    // Routes for admin only
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth', 'admin');
});

Route::middleware(['auth', 'superadmin'])->group(function () {
    // Routes for superadmin only
    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard')->middleware('auth', 'superadmin');
    // User management routes
    Route::get('/index', [SuperAdminController::class, 'manageUsers'])->name('manage-users');
    Route::get('/create', [SuperAdminController::class, 'createUser'])->name('create-user');
    Route::post('/store', [SuperAdminController::class, 'storeUser'])->name('store-user');
    Route::get('/edit{id}', [SuperAdminController::class, 'editUser'])->name('edit-user');
    Route::put('/update{id}', [SuperAdminController::class, 'updateUser'])->name('update-user');
    Route::delete('/delete{id}', [SuperAdminController::class, 'deleteUser'])->name('delete-user');
    // Travel management routes
    Route::get('/manage-travels', [SuperAdminController::class, 'manageTravels'])->name('manage-travels');
    Route::get('/create-travel', [SuperAdminController::class, 'createTravel'])->name('create-travel');
    Route::post('/store-travel', [SuperAdminController::class, 'storeTravel'])->name('store-travel');
    Route::get('/edit-travel/{id}', [SuperAdminController::class, 'editTravel'])->name('edit-travel');
    Route::put('/update-travel/{id}', [SuperAdminController::class, 'updateTravel'])->name('update-travel');
    Route::delete('/delete-travel/{id}', [SuperAdminController::class, 'deleteTravel'])->name('delete-travel');
    // Location management routes
    Route::get('/manage-locations', [SuperAdminController::class, 'manageLocations'])->name('manage-locations');
    Route::get('/create-location', [SuperAdminController::class, 'createLocation'])->name('create-location');
    Route::post('/store-location', [SuperAdminController::class, 'storeLocation'])->name('store-location');
    Route::get('/edit-location/{id}', [SuperAdminController::class, 'editLocation'])->name('edit-location');
    Route::put('/update-location/{id}', [SuperAdminController::class, 'updateLocation'])->name('update-location');
    Route::delete('/delete-location/{id}', [SuperAdminController::class, 'deleteLocation'])->name('delete-location');
    // Schedule management routes
    Route::get('/manage-schedules', [SuperAdminController::class, 'manageSchedules'])->name('manage-schedules');
    Route::get('/create-schedule', [SuperAdminController::class, 'createSchedule'])->name('create-schedule');
    Route::post('/store-schedule', [SuperAdminController::class, 'storeSchedule'])->name('store-schedule');
    Route::get('/edit-schedule/{id}', [SuperAdminController::class, 'editSchedule'])->name('edit-schedule');
    Route::put('/update-schedule/{id}', [SuperAdminController::class, 'updateSchedule'])->name('update-schedule');
    Route::delete('/delete-schedule/{id}', [SuperAdminController::class, 'deleteSchedule'])->name('delete-schedule');
    // Booking management routes
    Route::get('/manage-bookings', [SuperAdminController::class, 'manageBookings'])->name('manage-bookings');
    Route::get('/create-booking', [SuperAdminController::class, 'createBooking'])->name('create-booking');
    Route::post('/store-booking', [SuperAdminController::class, 'storeBooking'])->name('store-booking');
    Route::get('/edit-booking/{id}', [SuperAdminController::class, 'editBooking'])->name('edit-booking');
    Route::put('/update-booking/{id}', [SuperAdminController::class, 'updateBooking'])->name('update-booking');
    Route::delete('/delete-booking/{id}', [SuperAdminController::class, 'deleteBooking'])->name('delete-booking');
    // Trip management routes
    Route::get('/manage-trips', [SuperAdminController::class, 'manageTrips'])->name('manage-trips');
    Route::get('/create-trip', [SuperAdminController::class, 'createTrip'])->name('create-trip');
    Route::post('/store-trip', [SuperAdminController::class, 'storeTrip'])->name('store-trip');
    Route::get('/edit-trip/{id}', [SuperAdminController::class, 'editTrip'])->name('edit-trip');
    Route::put('/update-trip/{id}', [SuperAdminController::class, 'updateTrip'])->name('update-trip');
    Route::delete('/delete-trip/{id}', [SuperAdminController::class, 'deleteTrip'])->name('delete-trip');
    // Report routes
    Route::get('/report-bookings', [SuperAdminController::class, 'reportBookings'])->name('report-bookings');
    Route::get('/report/download', [SuperAdminController::class, 'downloadReport'])->name('report.download');
});

Route::middleware(['auth', 'user'])->group(function () {
    // Routes for regular users
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard')->middleware('auth', 'user');
    Route::get('/admin/register', [AdminRegisterController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('/admin/register', [AdminRegisterController::class, 'register']);
});
