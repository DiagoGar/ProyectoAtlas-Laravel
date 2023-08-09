<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function(){
  Route::get('user-profile', [AuthController::class, 'userProfile']);
  Route::post('logout', [AuthController::class, 'logout']);
});

Route::get('/almacen', [AlmacenController::class, 'index']);
Route::post('/almacen', [AlmacenController::class, 'store']);
Route::get('/almacen/{id}', [AlmacenController::class, 'show']);
Route::put('/almacen/{id}', [AlmacenController::class, 'update']);
Route::delete('/almacen/{id}', [AlmacenController::class, 'destroy']);