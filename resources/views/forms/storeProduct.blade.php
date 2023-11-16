@extends('layouts.main')

@section('title', 'Ingreso de Prodcuto')

@section('form')
  <form action="{{ url('/api/productos') }}" method="POST" class="mt-48 bg-orange-500 rounded-xl" style="width: 40vw">
    @csrf
    <div
      class="max-w-2xl mx-auto p-6 rounded-md shadow-lg flex justify-between bg-orange-500"
    >
      <div class="w-1/2 mr-4">
        <h3 class="text-xl font-bold mb-2">Datos del Producto</h3>
        <div class="mb-4">
          <label for="nombre" class="block mb-1 text-gray-800">Nombre</label>
          <input
            type="text"
            id="nombre"
            name="nombre"
            class="w-full border border-gray-300 text-slate-900 px-3 py-2 rounded-md"
            placeholder="Ingrese el nombre"
          />
        </div>
        <div class="mb-4">
          <label for="peso" class="block mb-1 text-gray-800"
            >Peso del Producto</label
          >
          <input
            type="number"
            id="peso"
            name="peso"
            class="w-full border text-slate-900 border-gray-300 px-3 py-2 rounded-md"
            placeholder="Ingrese el peso del producto"
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

      <div class="w-1/2 ml-4">
        <h3 class="text-xl font-bold mb-2">Datos del Envío</h3>
        <div class="mb-4">
          <label for="remitente" class="block mb-1 text-gray-800"
            >Remitente</label
          >
          <input
            type="text"
            id="remitente"
            name="remitente"
            class="w-full border text-slate-900 border-gray-300 px-3 py-2 rounded-md"
            placeholder="Ingrese el remitente"
          />
        </div>
        <div class="mb-4">
          <label for="destinatario" class="block mb-1 text-gray-800"
            >Destinatario</label
          >
          <input
            type="text"
            id="destinatario"
            name="destinatario"
            class="w-full border text-slate-900 border-gray-300 px-3 py-2 rounded-md"
            placeholder="Ingrese el destinatario"
          />
        </div>
        <div class="mb-4">
          <label for="destino" class="block mb-1 text-gray-800">Destino</label>
          <input
            type="text"
            id="destino"
            name="destino"
            class="w-full border text-slate-900 border-gray-300 px-3 py-2 rounded-md"
            placeholder="Ingrese el destino"
          />
        </div>
        <div class="mb-4">
          <label for="fechaEmision" class="block mb-1 text-gray-800"
            >Fecha de Emisión</label
          >
          <input
            type="date"
            id="fechaEmision"
            name="fechaEmision"
            class="w-full border text-slate-900 border-gray-300 px-3 py-2 rounded-md"
          />
        </div>
      </div>
    </div>
  </form>
@endsection