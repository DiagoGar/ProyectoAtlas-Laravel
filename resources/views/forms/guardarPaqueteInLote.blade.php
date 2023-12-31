@extends('layouts.main')

@section('title', 'Paquete en Lote')

@section('form')

<form action="{{ url('/api/productosInLote/')}}" method="POST" class="mt-64">
    @csrf
    <div
      class="max-w-2xl mx-auto p-6 rounded-md shadow-lg flex justify-between bg-orange-500"
    >
      <div class="w-1/2 mr-4">
        <h3 class="text-xl font-bold mb-2">Guardar paquete en lote</h3>
        <div class="mb-4">
          <label for="nombre" class="block mb-1 text-gray-800">Lote</label>
          <div class="mt-1 relative">
            <select id="example-select" name="idLotes" class="block w-full py-2 pl-3 pr-10 mt-1 text-black border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
              @foreach ($lotes as $lote)
              <option value="{{$lote->idLotes}}">id: {{$lote->idLotes}}</option>
              @endforeach
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
              <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v10a1 1 0 01-1.707.707l-6-6a1 1 0 010-1.414l6-6A1 1 0 0110 3z" clip-rule="evenodd" />
              </svg>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <label for="peso" class="block mb-1 text-gray-800"
            >Productos sin lote</label
          >

          <div class="max-w-md mx-auto bg-white rounded-md p-6 shadow-md w-96">
            <div class="flex flex-col items-start">
              @foreach ($productoSinRemitos as $productoRemito)    
                <div class="flex justify-center items-center">
                  <input type="checkbox" name="idRemitos[]" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded mr-6" value="{{$productoRemito->idRemitos}}">
                  <label for="example-checkbox" class="ml-2 text-sm text-gray-600">id: {{$productoRemito->idRemitos}} Nombre: {{$productoRemito->nombreProducto}}</label>
                </div>
              @endforeach
            </div>
          </div>

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