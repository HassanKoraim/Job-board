<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/job', [JobController::class,'index']);
Route::get('/', [IndexController::class,'index']);
Route::get('/about', [IndexController::class,'about']);
Route::get('/contact', [IndexController::class,'contact']);