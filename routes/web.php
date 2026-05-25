<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PasswordResetController;

Route::get('/', function () {
    return view('frontend.landing');
})->name('home');
Route::get('/about-us', function () {
    return view('frontend.about');
})->name('about');
Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');
Route::get('/products/tissue', function () {
    return view('frontend.products.tissue');
})->name('products.tissue');
Route::get('/products/home-care', function () {
    return view('frontend.products.home-care');
})->name('products.home-care');


//////////////////

// Auth
Route::get('/admin', [AuthController::class, 'loginPage'])->name('admin.loginPage');
Route::Post('/admin/login', [AuthController::class, 'login'])->name('admin.login');

Route::get('/forgot-password', [PasswordResetController::class, 'request'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'email'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'reset'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'store'])->middleware('guest')->name('password.update');

Route::get('/login', function () {
    return redirect()->route('admin.loginPage');
})->name('login');

Route::middleware('auth')->group(function () {
    Route::Post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard.index');
    });
});
