<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "The Name of Allah";
});
Route::get('/job', [JobController::class,'index']);