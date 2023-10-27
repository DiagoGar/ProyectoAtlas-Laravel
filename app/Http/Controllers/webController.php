<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use App\Models\Movimiento;
use App\Models\Nodo;
use App\Models\Producto;
use App\Models\RemitosProductosalmacen;
use App\Models\Tipofuncionario;
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

  public function storeLote(){
    $cedulafuncionario = Tipofuncionario::select('cedulaFuncionario')->get();
    return view('forms.storeLote', ['funcionario' => $cedulafuncionario]);
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
    $productoSinLote = Remitosproductosalmacen::select('remitos_productosalmacen.idRemitos', 'remitos_productosalmacen.idProductos', 'productos.nombreProducto')
    ->join('productos_almacen', 'remitos_productosalmacen.idRemitos', '=', 'productos_almacen.idProductos')
    ->join('productos', 'productos_almacen.idProductos', '=', 'productos.idProductos')
    ->whereNotIn('remitos_productosalmacen.idRemitos', function ($query) {
        $query->select('idRemitos')
            ->from('lote_remitosproductosalmacen')
            ->whereColumn('productos.idProductos', '=', 'remitos_productosalmacen.idRemitos');
    })
    ->get();

    return view('forms.guardarPaqueteInLote', ['lotes' => $lote, 'productoSinRemitos' => $productoSinLote]);
  }

  public function guardarLoteInNodo()
  {
    $nodo = Nodo::select('*')
    ->get();
    $movimineto = Movimiento::select('*')
    ->get();

    return view('forms.guardarLoteInNodo', ['nodos' => $nodo, 'movimientos' => $movimineto]);
  }

  // --------/-\/-\/-\--------Products Section--------/-\/-\/-\-------- //

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