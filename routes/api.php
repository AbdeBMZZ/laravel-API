<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuartierController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//protected routes
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/join', [QuartierController::class, 'join']);
    Route::post('/quartier', [QuartierController::class, 'addQuartier']);
    Route::get('/myquartiers', [UserController::class, 'getQuartiers']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/User', [AuthController::class, 'getUser']);
    Route::post('/post', [AuthController::class, 'addPost']);
    Route::get('/posts', [QuartierController::class, 'getPosts']);
    
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::get('/quartiers', [QuartierController::class, 'getQuartiers']);
Route::get('/quartier', [QuartierController::class, 'getQuartier']);


