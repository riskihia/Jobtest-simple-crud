<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CustomerController::class, 'index']);
Route::get('/login', [CustomerController::class, 'show']);
Route::post('/login', [CustomerController::class, 'login']);

Route::get('/home', [HomeController::class, 'homepage']);