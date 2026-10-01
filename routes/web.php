<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/job', [JobController::class,'index']);
Route::get('/', [IndexController::class,'index']);
Route::get('/about', [IndexController::class,'about']);
Route::get('/contact', [IndexController::class,'contact']);
Route::get( '/blog', [PostController::class,'index']);
Route::get( '/blog/create', [PostController::class,'create']);
