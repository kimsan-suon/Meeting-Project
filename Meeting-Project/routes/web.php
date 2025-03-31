<?php

use Illuminate\Support\Facades\Route;
use App\Models\Room;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaymentController;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/bookings', function () {
    $rooms = Room::all(); // Fetch all rooms from the database
    return view('bookings.index', compact('rooms'));
})->name('bookings.index');

Route::get('/bookings/{id}', function ($id) {
    $room = Room::findOrFail($id); // Fetch the room by its ID
    return view('bookings.show', compact('room'));
})->name('bookings.show');


Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/bookings', function () {
    $rooms = Room::all(); // Fetch all rooms from the database
    return view('bookings.index', compact('rooms'));
})->name('bookings.index');

Route::get('/bookings/{id}', function ($id) {
    $room = Room::findOrFail($id); // Fetch the room by its ID
    return view('bookings.show', compact('room'));
})->name('bookings.show');

Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

Route::get('/user/bookings', [BookingController::class, 'userBookings'])->name('user.bookings');

Route::get('/admin/bookings', [BookingController::class, 'adminBookings'])->name('admin.bookings')->middleware('auth');

Route::get('/admin/bookings/approve/{id}', [BookingController::class, 'approveBooking'])->name('admin.bookings.approve');
Route::get('/admin/bookings/cancel/{id}', [BookingController::class, 'cancelBooking'])->name('admin.bookings.cancel');

Route::get('/payment/{booking_id}', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');

