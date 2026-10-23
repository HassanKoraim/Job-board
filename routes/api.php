<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;

Route::post('comment/create', [CommentController::class,'create']);

Route::post( '/blog/create', [PostController::class,'create']);
Route::delete( '/blog/delete/{id}', [PostController::class,'delete']);

Route::post( '/tags/create', [TagController::class,'create']);
