<?php

namespace App\Http\Controllers;

use App\Models\Nodo;
use App\Models\Nododireccion;
use App\Models\Ruta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;

class AlmacenController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $nodoDireccion = Nododireccion::all();
        return view('almacenes.index')->with('nodos',$nodoDireccion);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $ruta = new Ruta();
        $nodo = new Nodo();
        $nodoDireccion = new Nododireccion();

        $nodo->nombreNodo = $request->nombreNodo;
        $nodoDireccion->calle = $request->calle;
        $nodoDireccion->rutaAcceso = $request->rutaAcceso;
        $nodoDireccion->ciudad = $request->ciudad;
        $nodoDireccion->numeroPuerta = $request->numeroPuerta;

        $ruta->idRutas = $request->idRutas;
        $nodo->esFinal = $request->esFinal;

        $nodo->save();

        $nodoDireccion->idNodos = $nodo->idNodos;

        $nodoDireccion->save();

        return [
            'nombreNodo' => $nodo->nombreNodo,
            'esFinal' => $nodo->esFinal,
            'ciudad' => $nodoDireccion->ciudad,
            'calle' => $nodoDireccion->calle,
            'rutaAcceso' => $nodoDireccion->rutaAcceso,
            'numeroPuerta' => $nodoDireccion->numeroPuerta
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Nododireccion $id)
    {
        return view('almacenes.show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $nodo = new Nodo();
        $nodoDireccion = new Nododireccion();
        
        $nodoDireccion = Nododireccion::findOrFail($request->id);
        $nodo = Nodo::findOrFail($request->id);
        
        $nodo->nombreNodo = $request->nombreNodo;
        $nodoDireccion->calle = $request->calle;
        $nodoDireccion->rutaAcceso = $request->rutaAcceso;
        $nodoDireccion->ciudad = $request->ciudad;
        $nodoDireccion->numeroPuerta = $request->numeroPuerta;

        $nodo->esFinal = $request->esFinal;

        $nodo->save();

        $nodoDireccion->idNodos = $nodo->idNodos;

        $nodoDireccion->save();

        $nodo->save();
        return view('almacenes.store', [
            'nombreNodo' => $nodo->nombreNodo,
            'esFinal' => $nodo->esFinal,
            'ciudad' => $nodoDireccion->ciudad,
            'calle' => $nodoDireccion->calle,
            'rutaAcceso' => $nodoDireccion->rutaAcceso,
            'numeroPuerta' => $nodoDireccion->numeroPuerta
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $nodo = Nododireccion::destroy($request->id);
        return redirect("/api/almacen");
    }
}
