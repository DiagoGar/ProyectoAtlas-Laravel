<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\Coch;
use App\Models\HojaderutaCamioneroscoch;
use App\Models\Hojaderutum;
use Illuminate\Http\Request;
use App\Models\Lote;
use App\Models\LoteRemitosproductosalmacen;
use App\Models\LotesMovimiento;
use App\Models\Movimiento;
use App\Models\Producto;
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

    public function GuardarLoteInNodo(Request $request)
    {
        $movimeinto = Movimiento::find($request->idMovimiento);
        $movimeinto->idNodos = $request->idNodo;

        $movimeinto->save();

        return $movimeinto;
        //return redirect
    }

    public function verLoteInCoche(Request $request){

        if(!isset($request->patente) || $request->patente == ''){
            $loteInCoche =  DB::table('coches')
            ->select('coches.patente', 'lotes.idLotes')
            ->join('hojaderuta_camioneroscoches', 'coches.patente', '=', 'hojaderuta_camioneroscoches.patente')
            ->join('hojaderuta', 'hojaderuta_camioneroscoches.idHojaDeRuta', '=', 'hojaderuta.idHojaDeRuta')
            ->join('movimientos', 'hojaderuta.idHojaDeRuta', '=', 'movimientos.idHojaDeRuta')
            ->join('lotes_movimientos', 'movimientos.idMovimientos', '=', 'lotes_movimientos.idMovimientos')
            ->join('lotes', 'lotes_movimientos.idLotes', '=', 'lotes.idLotes')
            ->get();
        
            return $loteInCoche;
        }else{
            $coche = Coch::findOrFail($request->patente);
            $loteInCoche =  DB::table('coches')
            ->select('coches.patente', 'lotes.idLotes')
            ->join('hojaderuta_camioneroscoches', 'coches.patente', '=', 'hojaderuta_camioneroscoches.patente')
            ->join('hojaderuta', 'hojaderuta_camioneroscoches.idHojaDeRuta', '=', 'hojaderuta.idHojaDeRuta')
            ->join('movimientos', 'hojaderuta.idHojaDeRuta', '=', 'movimientos.idHojaDeRuta')
            ->join('lotes_movimientos', 'movimientos.idMovimientos', '=', 'lotes_movimientos.idMovimientos')
            ->join('lotes', 'lotes_movimientos.idLotes', '=', 'lotes.idLotes')
            ->where('coches.patente', $coche->patente)
            ->get();
        
            return $loteInCoche;
        }
    }

    public function insertLoteInCoche(Request $request)
    {

        $hdr = new Hojaderutum();
        $movimiento = new Movimiento();
        $lotesMovimiento = new LotesMovimiento();
        $hdrcc = new HojaderutaCamioneroscoch();

        try{
            DB::beginTransaction();

            $hdr->idRutas = $request->hdridRutas;
            $hdr->save();

            $movimiento->idRutas = $request->hdridRutas; // tiene que ser el mismo idRtuas que el ingresado en hdr
            $movimiento->idHojaDeRuta = Hojaderutum::all()->last()->idHojaDeRuta; // el idHojaDeRuta tiene que existir en HojaDeRuta y tiene que tener la misma ruta que HojaDeRutas->idRutas
            $movimiento->estado = "En camino";
            $movimiento->fechaEstimada = $request->fechaEstimada;
            $movimiento->fechaLlegada = $request->fechaLlegada;
            $movimiento->save();

            $lotesMovimiento->idMovimientos = Movimiento::all()->last()->idMovimientos;
            $lotesMovimiento->idLotes = $request->idLotes;
            $lotesMovimiento->save();

            $hdrcc->idHojaDeRuta = Movimiento::all()->last()->idHojaDeRuta;
            $hdrcc->patente = $request->patente;
            $hdrcc->cedulaCamionero = $request->cedula;
            $hdrcc->fechaArranque = Carbon::today();
            $hdrcc->save();

            DB::commit();
            return redirect('/loteInCoche/' . $request->patente);


        } catch(\Exception $e) {
            DB::rollBack();
            return json_encode($e);
        }

    }
    
    public function destroy(Request $request){
        $lote = Lote::destroy($request->id);
        return $lote;
    }
}
