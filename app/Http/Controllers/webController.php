<?php

namespace App\Http\Controllers;

use App\Models\CamionerosCoch;
use App\Models\HojaderutaCamioneroscoch;
use App\Models\Hojaderutum;
use App\Models\Lote;
use App\Models\LotesMovimiento;
use App\Models\Movimiento;
use App\Models\Nodo;
use App\Models\Nododireccion;
use App\Models\Producto;
use App\Models\RemitosProductosalmacen;
use App\Models\Ruta;
use App\Models\Tipofuncionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
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
    $nodos = Nodo::select('*')->get();
    return view('forms.storeLote', ['funcionarios' => $cedulafuncionario , 'nodos' => $nodos]);
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
    $productoSinLote = Remitosproductosalmacen::select('remitos_productosalmacen.idRemitos', 'remitos_productosalmacen.idProductos', 'productos.nombreProducto', 'remitos.destino')
    ->join('remitos', 'remitos.idRemitos', '=', 'remitos_productosalmacen.idRemitos')
    ->join('productos_almacen', 'remitos_productosalmacen.idProductos', '=', 'productos_almacen.idProductos')
    ->join('productos', 'productos_almacen.idProductos', '=', 'productos.idProductos')
    ->whereNotIn('remitos_productosalmacen.idRemitos', function ($query) {
        $query->select('idRemitos')
            ->from('lote_remitosproductosalmacen')
            ->whereColumn('productos.idProductos', '=', 'remitos_productosalmacen.idRemitos');
    })
    ->get();

    return view('forms.guardarPaqueteInLote', ['lotes' => $lote, 'productoSinLote' => $productoSinLote]);
  }

  public function guardarLoteInNodo()
  {
    $nodo = Nodo::select('*')
    ->get();
    $movimineto = Movimiento::select('*')
    ->get();

    return view('forms.guardarLoteInNodo', ['nodos' => $nodo, 'movimientos' => $movimineto]);
  }

  public function verLoteInCoche(Request $request)
  {
    $patente = $request->patente;
    $request = Request::create('api/loteInCoche/'.$patente, 'GET');
    $response = Route::dispatch($request);
    $data = json_decode($response->getContent(), true);
    return view('lotes.loteInCoche', ['data' => $data]);
  }

  public function insertLoteInCoche(Request $request)
  {
    $rutas = Ruta::all();
    $midRutas =  DB::table('movimientos')
    ->join('hojaderuta', 'hojaderuta.idRutas', '=', 'movimientos.idRutas')
    ->select('movimientos.idRutas')
    ->get();
    $movimientos = Movimiento::all();
    $lotes = Lote::join('lotes_movimientos', 'lotes.idLotes', '=', 'lotes_movimientos.idLotes')
    ->join('movimientos', 'lotes_movimientos.idMovimientos', '=', 'movimientos.idMovimientos')
    ->whereNull('movimientos.idHojaDeRuta')
    ->orWhere('movimientos.idHojaDeRuta', '=', '')
    ->select('lotes.*')
    ->distinct()
    ->get();

    $cc = CamionerosCoch::all();

    $data = [
      'rutas' => $rutas,
      'midRutas' => $midRutas,
      'movimientos' => $movimientos,
      'lotes' => $lotes,
      'cc' => $cc
    ];

    // return $hdrcc;
    return view('forms.insertLoteInCoche', ['data' => $data]);

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

  // --------/-\/-\/-\--------Map Section--------/-\/-\/-\-------- //

  public function mapData(){
    $nodoDireccion = Nododireccion::all();
    return view('map.map', ['data' => $nodoDireccion]);
  }

  public function verMapa(Request $request){
    if ($request->origin || isset($request->origin)) {
      $origin = $request->origin;
      $destination = $request->destination;
      $destinationConvert = strtr($destination, " ", "+");
      $originConvert = strtr($origin, " ", "+");
      $url = 'https://maps.googleapis.com/maps/api/directions/json?origin=' .$originConvert . '&destination=' . $destinationConvert . '&language=es&key=AIzaSyD3zJVr4jqU-cOuELY32KrBvkTXSiK2mU0';
    }else{
      $destination = $request->destination;
      $destinationConvert = strtr($destination, " ", "+");
      $url = 'https://maps.googleapis.com/maps/api/directions/json?origin=republica+dominicana+3026+Montevideo&destination=' . $destinationConvert . '&language=es&key=AIzaSyD3zJVr4jqU-cOuELY32KrBvkTXSiK2mU0';
    }
    
    $response = Http::get($url);
    
    $data =  $response->json();

    foreach ($data['routes'][0]['legs'][0]['steps'] as $step) {
      $htmlInstructions = $step['html_instructions'];
      $distance[] = $step['distance']['text'];
      $instruction[] = $htmlInstructions;
      $start_location[] = $step['start_location'];
      $end_location[] = $step['end_location'];
    }


    $data = [
      'instruction' => $instruction,
      'distance' => $distance,
      'start_location' => $start_location,
      'end_location' => $end_location,
    ];

    return view('map.viewSteps', ['data' => $data]);
  }

}