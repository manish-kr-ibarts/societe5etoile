<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('admin.login');
});
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
