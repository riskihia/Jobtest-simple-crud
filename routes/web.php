<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SaleController;
use App\Http\Middleware\CustomerAuth;
use App\Http\Middleware\CustomerGuest;
use Illuminate\Support\Facades\Route;


Route::middleware([CustomerGuest::class])->group(function(){
    Route::get('/', [CustomerController::class, 'index']);
    Route::get('/login', [CustomerController::class, 'show']);
    Route::post('/login', [CustomerController::class, 'login']);
    
    Route::get('/register', [CustomerController::class, 'show_register']);
    Route::post('/register', [CustomerController::class, 'register']);
});

Route::middleware([CustomerAuth::class])->group(function(){
    Route::get('/logout', [CustomerController::class, 'logout']);
    
    ### Profile
    Route::get('/profile', [CustomerController::class, 'profile_page']);
    Route::post('/profile-topup', [CustomerController::class, 'topup']);

    Route::post('/update-contact', [CustomerController::class, 'update_contact']);

    Route::get('/home', [HomeController::class, 'homepage']);

    Route::get('/product-filter', [ProductController::class, 'filter']);


    Route::get('/buy', [SaleController::class, 'konfirm']);
    Route::post('/buy', [SaleController::class, 'buy']);


    Route::get('/report', [ReportController::class, 'index']);
});






