<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\Coch;
use App\Models\HojaderutaCamioneroscoch;
use App\Models\HojaderutaMovimieto;
use App\Models\Hojaderutum;
use Illuminate\Http\Request;
use App\Models\Lote;
use App\Models\LoteRemitosproductosalmacen;
use App\Models\LotesMovimiento;
use App\Models\Movimiento;
use App\Models\Nodo;
use App\Models\Producto;
use App\Models\ProductosAlmacen;
use App\Models\Remito;
use App\Models\RemitosProductosalmacen;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LoteController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function index()
    {
        $lote = Lote::all();

        return $lote;
        
    }

    public function store(Request $request)
    {   
        $lote = new Lote();
        $movimeinto = new Movimiento();
        $lotemovimiento = new LotesMovimiento();
        
        try{
            DB::beginTransaction();

            $lote->cedulaFuncionario = $request->cedulaFuncionario;
            $lote->cantidadProductos = $request->cantidadProductos;

            $lote->save();

            $idRutas = Nodo::where('idNodos', $request->idNodo)->pluck('idRutas');

            $movimeinto->idNodos = $request->idNodo;
            $movimeinto->idRutas = $idRutas[0];
            $movimeinto->estado = "Despachado";
            $movimeinto->fechaLlegada = $request->fechaLlegada;

            $movimeinto->save();

            $lotemovimiento->idMovimientos = $movimeinto->idMovimientos;
            $lotemovimiento->idLotes = $lote->idLotes;

            $lotemovimiento->save();

            DB::commit();
            return redirect('/lotes');
        }catch(\Exception $e){
            DB::rollBack();
            return json_encode($e);
        }
        
    }

    public function update(Request $request)
    {
        $lote = new Lote();
        $lote = Lote::findOrFail($request->id);

        $lote->cantidadProductos = $request->cantidadProductos;

        $lote->save();

        return $lote;
    }

    public function VerPaqueteInLote(Request $req)
    {
        // $rpa = new RemitosProductosalmacen();
        // $lrpa = new LoteRemitosproductosalmacen();
        // $lotes = new Lote();

        $query = Producto::join('remitos_productosalmacen', 'productos.idProductos', '=', 'remitos_productosalmacen.idProductos')
        ->join('lote_remitosproductosalmacen', 'remitos_productosalmacen.idRemitos', '=', 'lote_remitosproductosalmacen.idRemitos')
        ->where('lote_remitosproductosalmacen.idLotes', '=', $req->id)
        ->select('productos.*')
        ->get();

        return $query;
    }

    public function GuardarPaqueteInLote(Request $req)
    {
        try{
            DB::beginTransaction();
            $idRemitos = $req->input('idRemitos');
            foreach($idRemitos as $idRemito){            
                $lrpa = new LoteRemitosproductosalmacen();
                $lrpa->idLotes = $req->idLotes;
                $lrpa->idRemitos = $idRemito;
        
                $lrpa->save();
            };
    
            DB::commit();
            return redirect('/productosInLote/'.$lrpa->idLotes);
            
        }catch(\Exception $e){
            DB::rollBack();
            return json_encode($e);
        }
    }

    public function verLoteInNodo(Request $request)
    {
        $query = Lote::select('*')
        ->join('lotes_movimientos', 'lotes.idLotes', '=', 'lotes_movimientos.idLotes')
        ->join('movimientos', 'lotes_movimientos.idMovimientos', '=', 'movimientos.idMovimientos')
        ->join('nodos', 'movimientos.idNodos', '=', 'nodos.idNodos')
        ->get();

        return $query;
    }

    // public function GuardarLoteInNodo(Request $request)
    // {
    //     $movimeinto = Movimiento::find($request->idMovimiento);
    //     $movimeinto->idNodos = $request->idNodo;

    //     $movimeinto->save();

    //     return $movimeinto;
    //     //return redirect
    // }

    public function verLoteInCoche(Request $request){

        if(!isset($request->patente) || $request->patente == ''){
            $loteInCoche =  DB::table('coches')
            ->select('coches.patente', 'lotes.idLotes')
            ->join('hojaderuta_camioneroscoches', 'coches.patente', '=', 'hojaderuta_camioneroscoches.patente')
            ->join('hojaderuta', 'hojaderuta_camioneroscoches.idHojaDeRuta', '=', 'hojaderuta.idHojaDeRuta')
            ->join('hdr_movimientos', 'hojaderuta.idHojaDeRuta', '=', 'hdr_movimientos.idHojaDeRuta')
            ->join('movimientos', 'hdr_movimientos.idMovimientos', '=', 'movimientos.idMovimientos')
            ->join('lotes_movimientos', 'movimientos.idMovimientos', '=', 'lotes_movimientos.idMovimientos')
            ->join('lotes', 'lotes_movimientos.idLotes', '=', 'lotes.idLotes')
            ->distinct()
            ->get();
        
            return $loteInCoche;
        }else{
            $coche = Coch::findOrFail($request->patente);
            $loteInCoche =  DB::table('coches')
            ->select('coches.patente', 'lotes.idLotes')
            ->join('hojaderuta_camioneroscoches', 'coches.patente', '=', 'hojaderuta_camioneroscoches.patente')
            ->join('hojaderuta', 'hojaderuta_camioneroscoches.idHojaDeRuta', '=', 'hojaderuta.idHojaDeRuta')
            ->join('hdr_movimientos', 'hojaderuta.idHojaDeRuta', '=', 'hdr_movimientos.idHojaDeRuta')
            ->join('movimientos', 'hdr_movimientos.idMovimientos', '=', 'movimientos.idMovimientos')
            ->join('lotes_movimientos', 'movimientos.idMovimientos', '=', 'lotes_movimientos.idMovimientos')
            ->join('lotes', 'lotes_movimientos.idLotes', '=', 'lotes.idLotes')
            ->where('coches.patente', $coche->patente)
            ->where('movimientos.estado', 'en camino')
            ->distinct()
            ->get();
        
            return $loteInCoche;
        }
    }

    public function insertLoteInCoche(Request $request)
    {

        $lotes = $request->input('idLotes');

        foreach ($lotes as $lote) {
            $i = 0;
            $idNodosQuery = LotesMovimiento::select('movimientos.idNodos')
            ->join('movimientos', 'lotes_movimientos.idMovimientos', '=', 'movimientos.idMovimientos')
            ->where('lotes_movimientos.idLotes', '=', $lote)
            ->get();
        
            $idNodos = $idNodosQuery[$i]->idNodos;

            $idRutas = Nodo::where('idNodos', $idNodos)->pluck('idRutas');
        
            $i++;
        }

        try{
            DB::beginTransaction();

            foreach($lotes as $lote){
                $hdr = new Hojaderutum();
                $movimiento = new Movimiento();
                $lotesMovimiento = new LotesMovimiento();
                $hdrcc = new HojaderutaCamioneroscoch();

                $movimiento->idNodos = $idNodos;
                $movimiento->idRutas = $idRutas[0]; // tiene que ser el mismo idRtuas que el ingresado en hdr
                $movimiento->estado = "En camino";
                $movimiento->fechaEstimada = $request->fechaEstimada;
                $movimiento->fechaLlegada = $request->fechaLlegada;
                $movimiento->save();

                $lotesMovimiento->idMovimientos = Movimiento::all()->last()->idMovimientos;
                $lotesMovimiento->idLotes = $lote;
                $lotesMovimiento->save();

                $hdr->idRutas = $idRutas[0];
                $hdr->save();

                $idhdr = Movimiento::join('lotes_movimientos', 'movimientos.idMovimientos', '=', 'lotes_movimientos.idMovimientos')
                ->join('lotes', 'lotes_movimientos.idLotes', '=', 'lotes.idLotes')
                ->where('lotes.idLotes', '=', $lote)
                ->select('movimientos.idMovimientos')
                ->get(); 

                $idMovimiento = Movimiento::select('movimientos.idMovimientos')
                ->join('lotes_movimientos', 'movimientos.idMovimientos', '=', 'lotes_movimientos.idMovimientos')
                ->where('lotes_movimientos.idLotes', $lote)
                ->get();

                foreach($idMovimiento as $item){
                    $hdrm = new HojaderutaMovimieto();
                    $hdrm->idHojaDeRuta = Hojaderutum::all()->last()->idHojaDeRuta;
                    $hdrm->idMovimientos = $item->idMovimientos;
                    $hdrm->save();
                }

            }

            $hdrcc->idHojaDeRuta = Hojaderutum::all()->last()->idHojaDeRuta;
            $hdrcc->patente = $request->patente;
            $hdrcc->cedulaCamionero = $request->cedula;
            $hdrcc->fechaArranque = Carbon::today();
            $hdrcc->save();

            DB::commit();
            return redirect('loteInCoche/' . $request->patente);


        } catch(\Exception $e) {
            DB::rollBack();
            return json_encode($e);
        }

    }

    public function bajarLoteInNodo(Request $request){
        try{

            $lote = Lote::findOrFail($request->idLotes);
            $idLote = $lote->idLotes;

            $datos = Movimiento::select('idNodos', 'idRutas')
            ->join('lotes_movimientos', 'movimientos.idMovimientos', '=', 'lotes_movimientos.idMovimientos')
            ->where('lotes_movimientos.idLotes', $idLote)
            ->distinct()
            ->get();
            $datos = $datos[0];

            DB::beginTransaction();

            $lastIdM = Movimiento::join('lotes_movimientos', 'movimientos.idMovimientos', '=', 'lotes_movimientos.idMovimientos')
            ->where('lotes_movimientos.idLotes', 43)
            ->where('movimientos.estado', 'en camino')
            ->pluck('movimientos.idMovimientos');

            $mov = Movimiento::find($lastIdM[0]);
            $mov->idNodos = $datos->idNodos;
            $mov->idRutas = $datos->idRutas;
            $mov->fechaLlegada = Carbon::today();
            $mov->save();


            $movimiento = new Movimiento();
            $movimiento->idNodos = $datos->idNodos;
            $movimiento->idRutas = $datos->idRutas;
            $movimiento->estado = 'Entregado';
            $movimiento->fechaLlegada = Carbon::today();
            $movimiento->save();

            // $coche = Coch::findOrFail($request->patente);
            // $loteInCoche =  DB::table('movimientos')
            // ->select('*')
            // ->join('hojaderuta_camioneroscoches', 'coches.patente', '=', 'hojaderuta_camioneroscoches.patente')
            // ->join('hojaderuta', 'hojaderuta_camioneroscoches.idHojaDeRuta', '=', 'hojaderuta.idHojaDeRuta')
            // ->join('movimientos', 'hojaderuta.idHojaDeRuta', '=', 'movimientos.idHojaDeRuta')
            // ->join('lotes_movimientos', 'movimientos.idMovimientos', '=', 'lotes_movimientos.idMovimientos')
            // ->join('lotes', 'lotes_movimientos.idLotes', '=', 'lotes.idLotes')
            // ->where('coches.patente', $coche->patente)
            // ->where('movimientos.estado', 'en camino')
            // ->distinct()
            // ->get();

            $destinatario = Producto::select('remitos.destinatario')
            ->join('productos_almacen', 'productos.idProductos', '=', 'productos_almacen.idProductos')
            ->join('remitos_productosalmacen', 'productos_almacen.idProductos', '=', 'remitos_productosalmacen.idProductos')
            ->join('remitos', 'remitos_productosalmacen.idRemitos', '=', 'remitos.idRemitos')
            ->join('lote_remitosproductosalmacen', 'remitos.idRemitos', '=', 'lote_remitosproductosalmacen.idRemitos')
            ->join('lotes', 'lote_remitosproductosalmacen.idLotes', '=', 'lotes.idLotes')
            ->where('lotes.idLotes', '=', $idLote)
            ->get();

// Eliminar registros en cascada

            DB::commit();
            return "Lote bajado con exito";

        }catch(\Exception $e){
            DB::rollBack();
            return $e;
        }

    }
    
    public function destroy(Request $request){
        $lote = Lote::destroy($request->id);
        return $lote;
    }
}
