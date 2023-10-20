<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\Hojaderutum;
use Illuminate\Http\Request;
use App\Models\Lote;
use App\Models\LoteRemitosproductosalmacen;
use App\Models\LotesMovimiento;
use App\Models\Movimiento;
use App\Models\Producto;
use App\Models\RemitosProductosalmacen;

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

        $lote->cedulaFuncionario = $request->cedulaFuncionario;
        $lote->cantidadProductos = $request->cantidadProductos;

        $lote->save();

        $movimeinto = new Movimiento();
        $movimeinto->estado = "Despachado";
        $movimeinto->fechaLlegada = "2023-09-23";

        $movimeinto->save();

        $lotemovimiento = new LotesMovimiento();
        $lotemovimiento->idMovimientos = $movimeinto->idMovimientos;
        $lotemovimiento->idLotes = $lote->idLotes;

        $lotemovimiento->save();

        return redirect('/lotes');
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
        $rpa = new RemitosProductosalmacen();
        $lrpa = new LoteRemitosproductosalmacen();
        $lotes = new Lote();

        $query = Producto::join('remitos_productosalmacen', 'productos.idProductos', '=', 'remitos_productosalmacen.idProductos')
        ->join('lote_remitosproductosalmacen', 'remitos_productosalmacen.idRemitos', '=', 'lote_remitosproductosalmacen.idRemitos')
        ->where('lote_remitosproductosalmacen.idLotes', '=', $req->id)
        ->select('productos.*')
        ->get();

        return $query;
    }

    public function GuardarPaqueteInLote(Request $req)
    {
        $idRemitos = $req->input('idRemitos');
        foreach($idRemitos as $idRemito){            
            $lrpa = new LoteRemitosproductosalmacen();
            $lrpa->idLotes = $req->idLotes;
            $lrpa->idRemitos = $idRemito;
    
            $lrpa->save();
        };

        return redirect('/productosInLote/'.$lrpa->idLotes);
    }

    public function loteInAlmacen(Request $request)
    {
        $lotemovimiento = new LotesMovimiento();
        $lotemovimiento = LotesMovimiento::findOrFail($request->idLote);
    }
    
    public function destroy(Request $request){
        $lote = Lote::destroy($request->id);
        return $lote;
    }
}
