<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupportRequestController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourceBookingController;

Route::get('/', function () {
    return view('welcome'); // or your public homepage view
});

// Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Campus Support Request Routes
    Route::get('/requests', [SupportRequestController::class, 'index'])->name('requests.index');
    Route::get('/requests/create', [SupportRequestController::class, 'create'])->name('requests.create');
    Route::post('/requests', [SupportRequestController::class, 'store'])->name('requests.store');
    Route::patch('/requests/{supportRequest}/status', [SupportRequestController::class, 'updateStatus'])->name('requests.updateStatus');

    // Campus Support Request Comments Routes
    Route::get('/requests/{supportRequest}', [SupportRequestController::class, 'show'])->name('requests.show');
    Route::post('/requests/{supportRequest}/comments', [CommentController::class, 'store'])->name('comments.store');
   
   // Campus Resource Booking Routes
    Route::get('/bookings', [ResourceBookingController::class, 'index'])->name('bookings.index');
    Route::post('/bookings', [ResourceBookingController::class, 'store'])->name('bookings.store');
    Route::patch('/bookings/{booking}/status', [ResourceBookingController::class, 'updateStatus'])->name('bookings.updateStatus');
});



require __DIR__ . '/auth.php';
