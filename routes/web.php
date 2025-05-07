<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CustomerController::class, 'index']);
Route::get('/login', [CustomerController::class, 'show']);
Route::post('/login', [CustomerController::class, 'login']);

Route::get('/home', [HomeController::class, 'homepage']);


Route::get('/product-filter', [ProductController::class, 'filter']);


Route::get('/buy', [SaleController::class, 'konfirm']);
Route::post('/buy', [SaleController::class, 'buy']);


Route::get('/report', [ReportController::class, 'index']);


Route::get('/profile', [CustomerController::class, 'profile_page']);
