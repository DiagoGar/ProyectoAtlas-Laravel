<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function index()
    {
        $almacenes = Almacen::all();
        return $almacenes;
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Almacen $id)
    {
        return response($id);
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
