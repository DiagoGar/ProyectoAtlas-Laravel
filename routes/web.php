<?php

use App\Http\Controllers\AdminController;
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
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviosMailable;
use App\Models\Nododireccion;

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
Route::get('/crearLote', [webController::class, 'storeLote']);
Route::get('/loteInCoche/{patente?}', [webController::class, 'verLoteInCoche']);
Route::get('/insertLoteInCoche', [webController::class, 'insertLoteInCoche']);
Route::view('/bajarLote', 'forms.bajarLote');
Route::get('/bajarLote', [webController::class, 'bajarLote']);

Route::get('/productosInLote/{id}', [webController::class, 'verProductoInLote']);
Route::get('/productosInLote', [webController::class, 'guardarpaqueteInLote']);

Route::get('/productos', [webController::class, 'indexProductos']);
Route::view('/agregarProducto', 'forms.storeProduct')->name('storeProduct');
Route::get('/edita-producto/{id}', [webController::class, 'updateProduct']);

// Route::get('/loteInNodo', [webController::class, 'guardarLoteInNodo']);

Route::get('/mapData', [webController::class, 'mapData']);
Route::get('/viewMap', [webController::class, 'verMapa']);

// \/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ ADMIN /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ \\

Route::view('/admin', 'admin.deshboard');

Route::get('/admin/usuarios', [AdminController::class, 'indexUsuario']);

Route::view('/admin/funcionarios', 'admin.funcionarios', ['data' => \App\Models\Tipofuncionario::all()]);
Route::view('/admin/funcionario', 'admin.funcionario', ['data' => \App\Models\Usuario::all()]);
Route::view('/admin/CrearFuncionario', [AdminController::class, 'storeFuncionario']);

Route::get('/admin/camioneros', [AdminController::class, 'indexCamioneros']);

// \/\/\/\/\//\/\/\\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/ \\

Route::get('/login', function(){
    return view('login');
})->name('login');

// Route::get('/email', function(){
//     return (new EnviosMailable("Entregado"))->render();
// })->name("email");


