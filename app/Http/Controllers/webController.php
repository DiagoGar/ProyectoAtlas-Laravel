<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use App\Models\Producto;
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

  public function verProductoInLote(Request $request){
    $id = $request->id;
    $request = Request::create('api/productosInLote/'.$id, 'GET');
    $response = Route::dispatch($request);
    $data = json_decode($response->getContent(), true);
    return view('lotes.paqueteInLote', ['data' => $data]);
  }

  public function guardarpaqueteInLote(Request $request)
  {
    $lote = Lote::all();
    $producto = Producto::all();
    return view('forms.guardarPaqueteInLote', ['lotes' => $lote, 'productos' => $producto]);
  }

  // --------/-\/-\/-\--------Lotes Section--------/-\/-\/-\-------- //

  public function indexProductos()
  {
    $request = Request::create('/api/productos', 'GET');
    $response = Route::dispatch($request);
    $data = json_decode($response->getContent(), true);
    return view('productos.index', ['data' => $data]);
  }

  public function updateProduct(Request $request, $id)
  {
    $request = Request::create('api/producto/'.$id, 'GET', [$id]);
    $response = Route::dispatch($request);
    $data = json_decode($response->getContent(), true);
    return view('forms.updateProduct', ['data' => $data]);
    // return view('welcome');
    // $id = $request->id;
    // $request = Request::create('api/productos/'.$id, 'POST', $id);
    // $response = Route::dispatch($request);
    // $data = json_decode($response->getContent(), true);
    // return view('forms.updateProducts', ['data' => $data]);
  }
}