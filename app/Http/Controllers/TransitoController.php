<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use Illuminate\Http\Request;

class TransitoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(){
        $movimiento = Movimiento::all();
        return $movimiento;
    }

    public function seguimiento(Request $request){
        $movimiento = Movimiento::findOrFail($request->id);
        return response()->json([$movimiento->estado, $movimiento->fechaEstimada, $movimiento->fechaLlegada]);
    }

    public function modificarSeguimiento(Request $request){
        $movimiento = new Movimiento();
        $movimiento = Movimiento::findOrFail($request->id);

        $movimiento->idNodo = $request->idNodo;
        $movimiento->idRuta = $request->idRuta;
        $movimiento->estado = $request->estado;
        // $movimiento->fechaLlegada = $request->fechaLlegada;
        // $movimiento->fechaEstimada = $request->fechaEstimada;

        $movimiento->save();

        return $movimiento;

    }
}
