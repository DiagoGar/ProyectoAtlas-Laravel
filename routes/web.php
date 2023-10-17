<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\TransitoController;
use App\Http\Controllers\webController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

Route::get('/lotes', [webController::class, 'indexLotes']);

Route::get('productosInLote/{id}', [webController::class, 'verProductoInLote']);
Route::get('productosInLote', [webController::class, 'guardarpaqueteInLote']);

Route::get('/productos', [webController::class, 'indexProductos']);
Route::view('/agregarProducto', 'forms.storeProduct')->name('storeProduct');
// Route::view('editarProdcuto', 'forms.updateProduct')->name('updateProduct');
Route::get('/edita-producto/{id}', [webController::class, 'updateProduct']);


Route::get('/login', function(){
    return view('login');
})->name('login');

