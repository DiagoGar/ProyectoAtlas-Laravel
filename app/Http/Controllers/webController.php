<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class webController extends Controller
{

  // --------/-\/-\/-\--------Lotes Section--------/-\/-\/-\-------- //
  public function indexLotes(){
    $request = Request::create('/api/lotes', 'GET');
    $response = Route::dispatch($request);
    $data = json_decode($response->getContent(), true);
    return view('lotes.index', ['data' => $data]);
  }

  // --------/-\/-\/-\--------Lotes Section--------/-\/-\/-\-------- //

  public function indexProductos()
  {
    $request = Request::create('/api/productos', 'GET');
    $response = Route::dispatch($request);
    $data = json_decode($response->getContent(), true);
    return view('productos.index', ['data' => $data]);
  }
}