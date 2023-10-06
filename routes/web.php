<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\TransitoController;
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

Route::get('/lotes', function(){
    $request = Request::create('/api/lotes', 'GET');
    $response = Route::dispatch($request);
    $data = json_decode($response->getContent(), true);
    return view('lotes.index', ['data' => $data]);
});

// Route::get('/prueba', function () {
    // $response = Http::get('/api/lotes/');
    // dd($response);
    // $request = Request::create('/api/lotes', 'GET');
    // $response = Route::dispatch($request);
    // $c_data = json_decode($response->getContent(), true);
    // return view('welcome', ['data' => $c_data]);
// });

Route::get('/login', function(){
    return view('login');
})->name('login');

