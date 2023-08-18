<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $almacenes = Almacen::all();
        return view('almacenes.index')->with('almacenes',$almacenes);
        //no funciona de momento
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
        $almacen = new Almacen();
        $almacen->nombre = $request->nombre;
        $almacen->rut = $request->rut;
        $almacen->direccionAlmacen = $request->direccionAlmacen;

        $almacen->save();

        return view('almacenes.store', [
            'nombre' => $almacen->nombre,
            'rut' => $almacen->rut, 
            'direccionAlmacen' => $almacen->direccionAlmacen]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Almacen $id)
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
        $almacen = new Almacen();
        
        $almacen = Almacen::findOrFail($request->id);
        $almacen->nombre = $request->nombre;
        $almacen->rut = $request->rut;
        $almacen->direccionAlmacen = $request->direccionAlmacen;

        $almacen->save();
        return $almacen;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $almacen = Almacen::destroy($request->id);
        return $almacen;
    }
}
