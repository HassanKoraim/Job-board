<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// ## Public Routes
Route::get('/job', [JobController::class, 'index']);

Route::get('/', IndexController::class);
Route::get('/contact', ContactController::class);

Route::resource('/tags', TagController::class);

Route::get('/signup', [AuthController::class, 'showSignUpForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signUp']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ## Protected Routes
Route::middleware('auth')->group(function () {
    Route::resource('/blogs', PostController::class);
    Route::resource('comments', CommentController::class);
});

Route::middleware('SuperAdmin')->group(function () {
    Route::get('/about', AboutController::class);
});
