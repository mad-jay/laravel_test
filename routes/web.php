<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

Route::get('/', function () {
    return view('welcome');
});

// Show the login form
Route::get('/index', [ListingController::class, 'showLoginForm'])->name('login');

// Handle login form submission
Route::post('/login', [ListingController::class, 'login'])->name('login.submit');

// Admin dashboard
Route::get('/admin/dashboard', [ListingController::class, 'adminDashboard'])->name('admin.dashboard');

// User dashboard
Route::get('/user/dashboard', [ListingController::class, 'userDashboard'])->name('user.dashboard');

// CRUD for Listings (Admin Only)
Route::resource('listings', ListingController::class)->except('show');

Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');

Route::get('/admin', [ListingController::class, 'index'])->name('admin.dashboard');





