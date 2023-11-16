<?php

namespace App\Http\Controllers;

use App\Models\LoteRemitosproductosalmacen;
use App\Models\Producto;
use App\Models\ProductosAlmacen;
use App\Models\Remito;
use App\Models\RemitosProductosalmacen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
  public function index()
  {
    $producto = Producto::select('productos.*')
    ->join('remitos_productosalmacen', 'productos.idProductos', '=', 'remitos_productosalmacen.idProductos')
    ->join('lote_remitosproductosalmacen', 'remitos_productosalmacen.idRemitos', '=', 'lote_remitosproductosalmacen.idRemitos')
    ->join('lotes_movimientos', 'lote_remitosproductosalmacen.idLotes', '=', 'lotes_movimientos.idLotes')
    ->join('movimientos', 'lotes_movimientos.idMovimientos', '=', 'movimientos.idMovimientos')
    ->where(function ($query) {
        $query->where('movimientos.estado', 'en camino')
            ->orWhere('movimientos.estado', 'despachado');
    })
    ->whereNull('movimientos.fechaLlegada')
    ->get();
    return $producto;
  }

  public function show($id)
  {
    $product = Producto::find($id);
    $remito = Remito::find($id);

    $data = [
      'product' => $product,
      'remito' => $remito,
    ];

    return $data;
  }

  public function store(Request $request)
  {
    try{
      DB::beginTransaction();

      $producto = new Producto();

    $producto->nombreProducto = $request->nombre;
    $producto->pesoProducto = $request->peso;

    $producto->save();

    $remito = new Remito();

    $remito->remitente = $request->remitente;
    $remito->destinatario = $request->destinatario;
    $remito->destino = $request->destino;
    $remito->fechaEmision = $request->fechaEmision;

    $remito->save();

    $pa = new ProductosAlmacen();
    $pa->idAlmacen = 1;
    $pa->idProductos = Producto::all()->last()->idProductos;

    $pa->save();

    $rpa = new RemitosProductosalmacen();
    $rpa->idRemitos = Remito::all()->last()->idRemitos;
    $rpa->idProductos = ProductosAlmacen::all()->last()->idProductos;

    $rpa->save();

    DB::commit();
    return redirect('/productos');

    } catch (\Exception $e){
      DB::rollBack();
      return $e;
    }
  }

  public function update(Request $request, $id)
  {
    $product = Producto::findOrFail($id);
    $product->nombreProducto = $request->nombre;
    $product->pesoProducto = $request->peso;

    $product->save();

    $remito = Remito::findOrFail($id);
    $remito->remitente = $request->remitente;
    $remito->destinatario = $request->destinatario;
    $remito->destino = $request->destino;
    $remito->fechaEmision = $request->fechaEmision;

    $remito->save();

    return redirect('/productos');
  }

  public function destroy(Request $request)
  {
    $rpa = RemitosProductosalmacen::destroy($request->id);
    $lrpa = LoteRemitosproductosalmacen::destroy($request->id);
    $pa = ProductosAlmacen::destroy($request->id);
    $producto = Producto::destroy($request->id);
    return redirect('/productos');
  }
}