@extends('layouts.main')

@section('title', 'Paquete en Lote')

@section('form')

<form action="{{ url('/api/loteInNodo/')}}" method="POST" class="mt-64">
    @csrf
    <div
      class="max-w-2xl mx-auto p-6 rounded-md shadow-lg flex justify-between bg-orange-500"
    >
      <div class="w-1/2 mr-4">
        <h3 class="text-xl font-bold mb-2">Guardar paquete en lote</h3>
        <div class="mb-4">
          <label for="peso" class="block mb-1 text-gray-800"
            >Productos sin lote</label
          >

          <div class="max-w-md mx-auto bg-white rounded-md p-6 shadow-md w-96">
            <div class="flex flex-col items-start">
              @foreach ($movimientos as $movimiento)    
                <div class="flex justify-center items-center">
                  <input type="checkbox" name="idMovimiento" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded mr-6" value="{{$movimiento->idMovimientos}}">
                  <label for="example-checkbox" class="ml-2 text-sm text-gray-600">id: {{$movimiento->idMovimientos}}</label>
                </div>
              @endforeach
            </div>
          </div>

          <div class="max-w-md mx-auto bg-white rounded-md p-6 shadow-md w-96">
            <div class="flex flex-col items-start">
              @foreach ($nodos as $nodo)    
                <div class="flex justify-center items-center">
                  <input type="checkbox" name="idNodo" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded mr-6" value="{{$nodo->idNodos}}">
                  <label for="example-checkbox" class="ml-2 text-sm text-gray-600">id: {{$nodo->idNodos}}</label>
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