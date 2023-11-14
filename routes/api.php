<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CamioneroController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TransitoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Sanctum;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/user-profile', [AuthController::class, 'userProfile']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/almacen', [AlmacenController::class, 'index'])->name('show');
Route::post('/almacen', [AlmacenController::class, 'store']);
// Route::get('/almacen/{id}', [AlmacenController::class, 'show']);
Route::post('/almacen/{id}', [AlmacenController::class, 'update'])->name('edit');
Route::get('/almacen/{id}', [AlmacenController::class, 'destroy'])->name('delete');

Route::get('/productos', [ProductoController::class, "index"]);
Route::get('/producto/{id}', [ProductoController::class, 'show']);
Route::get('/productos/{id}', [ProductoController::class, 'destroy']);
Route::post('/productos', [ProductoController::class, "store"]);
Route::post('/productos/{id}', [ProductoController::class, 'update']);

Route::get('/productosInLote/{id}', [LoteController::class, 'VerPaqueteInLote']);
Route::post('/productosInLote', [LoteController::class, "GuardarPaqueteInLote"]);

Route::get('/lotes', [LoteController::class, 'index']);
Route::post('/lotes', [LoteController::class, 'store']);
Route::get('/lotes/{id}', [LoteController::class, 'destroy']);
Route::post('/lotes/{id}', [LoteController::class, 'update']);

Route::get("/loteInNodo", [LoteController::class, 'verLoteInNodo']);
Route::post('/bajarLoteInNodo', [LoteController::class, 'bajarLoteInNodo']);
// Route::post("/loteInNodo", [LoteController::class, 'GuardarLoteInNodo']);

Route::get('/loteInCoche/{patente?}', [LoteController::class, 'verLoteInCoche']);
Route::post('/loteInCoche', [LoteController::class, 'insertLoteInCoche']);

Route::get('/transito', [TransitoController::class, 'index']);
Route::get('/transito/{id}', [TransitoController::class, 'seguimiento']);
Route::post('/transito/{id}', [TransitoController::class, 'seguimiento']);

Route::get('/map', [CamioneroController::class, 'verMapa']);