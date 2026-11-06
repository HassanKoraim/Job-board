<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;

Route::get('/job', [JobController::class,'index']);

Route::get('/', IndexController::class);
Route::get('/about', AboutController::class);
Route::get('/contact', ContactController::class);

Route::resource('/blogs', PostController::class);
// Route::get( '/blog', [PostController::class,'index']);
// Route::get('/blog/show/{id}', [PostController::class,'show']);

Route::resource('comments', CommentController::class);
// Route::get('comment/index', [CommentController::class,'index']);

Route::resource('/tags', TagController::class);
// Route::get( '/tags', [TagController::class,'index']);
// Route::get( '/tags/testManyToMany', [TagController::class,'testManyToMany']); 

Route::get('/signup', [AuthController::class, 'showSignUpForm']);
Route::post('/signup', [AuthController::class, 'signUp']);

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);
