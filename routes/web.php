<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PasswordResetController;
use App\Http\Controllers\Admin\QRCodeController;

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
Route::get('/generate-qrcode', [QRCodeController::class, 'generateQRCode']);

Route::get('/scan/result', [QRCodeController::class, 'betterLuck'])->name('scan.result');

// Auth
Route::get('/admin', [AuthController::class, 'loginPage'])->name('admin.loginPage');
Route::Post('/admin/login', [AuthController::class, 'login'])->name('admin.login');

Route::get('/forgot-password', [PasswordResetController::class, 'request'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'email'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'reset'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'store'])->name('password.update');

Route::get('/login', function () {
    return redirect()->route('admin.loginPage');
})->name('login');

Route::middleware(['auth', 'roleCheck:admin'])->group(function () {
    Route::Post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard.index');
    });

    Route::get('/admin/qrcodes', [QRCodeController::class, 'index'])->name('admin.qrcodes.index');
    Route::get('/admin/qrcodes/create', [QRCodeController::class, 'create'])->name('admin.qrcodes.create');
    Route::post('/admin/qrcodes', [QRCodeController::class, 'store'])->name('admin.qrcodes.store');
    Route::get('/admin/qrcodes/{id}/edit', [QRCodeController::class, 'edit'])->name('admin.qrcodes.edit');
    Route::put('/admin/qrcodes/{id}', [QRCodeController::class, 'update'])->name('admin.qrcodes.update');
    Route::get('/admin/qrcodes/{id}/download', [QRCodeController::class, 'download'])->name('admin.qrcodes.download');

    // Categories
    Route::resource('admin/categories', \App\Http\Controllers\Admin\CategoryController::class)->names([
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
    ]);

    // Products
    Route::resource('admin/products', \App\Http\Controllers\Admin\ProductController::class)->names([
        'index' => 'admin.products.index',
        'create' => 'admin.products.create',
        'store' => 'admin.products.store',
        'edit' => 'admin.products.edit',
        'update' => 'admin.products.update',
        'destroy' => 'admin.products.destroy',
    ]);
});
