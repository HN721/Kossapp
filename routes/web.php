<?php

use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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
Route::get('/check-booking', [BookingController::class, 'check'])->name('check-booking');
Route::get("/category/{slug}", [CategoryController::class, 'show'])->name('category.show');
Route::get('/find-kos', [BoardingHouseController::class, 'find'])->name('find-kos');
Route::get('/find-kos-result', [BoardingHouseController::class, 'findResult'])->name('find-kos-result');
Route::get('/boarding-house/{slug}', [BoardingHouseController::class, 'show'])->name('boarding-house.show');
Route::get('/boarding-house/{slug}/rooms', [BoardingHouseController::class, 'rooms'])->name('boarding-house.rooms');
