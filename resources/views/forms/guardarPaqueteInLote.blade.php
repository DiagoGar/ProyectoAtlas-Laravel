@extends('layouts.main')

@section('title', 'Paquete en Lote')

@section('form')

<form action="/api/productosInLote/" method="POST">
    @csrf
    <div
      class="max-w-2xl mx-auto p-6 rounded-md shadow-lg flex justify-between bg-orange-500"
    >
      <div class="w-1/2 mr-4">
        <h3 class="text-xl font-bold mb-2">Guardar paquete en lote</h3>
        <div class="mb-4">
          <label for="nombre" class="block mb-1 text-gray-800">Id lote</label>
          <input
            type="number"
            name="idLotes"
            class="w-full border border-gray-300 text-slate-900 px-3 py-2 rounded-md"
            placeholder="Ingrese el id del lote"
          />
        </div>
        <div class="mb-4">
          <label for="peso" class="block mb-1 text-gray-800"
            >Peso del Producto</label
          >
          <input
            type="number"
            id="peso"
            name="idRemitos"
            class="w-full border text-slate-900 border-gray-300 px-3 py-2 rounded-md"
            placeholder="Ingrese el id del remito"
          />
        </div>
        <div class="boton text-center mt-5">
          <button
            type="submit"
            class="mt-12 max-w-max bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-700"
          >
            Enviar
          </button>
        </div>
      </div>
</form>
@endsection