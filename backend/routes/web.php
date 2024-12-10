<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingDetailController;
use App\Http\Controllers\PaymentController;

Route::prefix('api')->group(function () {
    Route::resource('users', UserController::class);
});

// Route::resource('movies', MovieController::class);
// Route::resource('cinemas', CinemaController::class);
// Route::resource('halls', HallController::class);
// Route::resource('seats', SeatController::class);
// Route::resource('shows', ShowController::class);
// Route::resource('bookings', BookingController::class);
// Route::resource('booking-details', BookingDetailController::class);
// Route::resource('payments', PaymentController::class);