<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BlockedTimeSlotController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

});

/**
 * API Routes for Booking
 */
Route::apiResource('bookings', BookingController::class);

/***
 * API Routes for BlockedTimeSlot
 */
Route::get('booked-slots', [BookingController::class, 'getBookedSlots']);

