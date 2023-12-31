@extends('layouts.main')

@section('title', 'Crear lote')

@section('form')
@extends('layouts.main')

@section('title', 'Crear lote')

@section('form')
  <form action="{{ url('/api/lotes')}}" method="POST" class="mt-64">
    @csrf
    <div class="max-w-2xl mx-auto p-6 rounded-md shadow-lg flex justify-between bg-orange-500">
      <div class="w-1/2 mr-4">
        <h3 class="text-xl font-bold mb-2">Crear lote</h3>
        <div class="mb-4">
          <label for="nombre" class="block mb-1 text-black-800">cedula Funcionario</label>
          <div class="mt-1 relative">
            <select name="cedulaFuncionario" class="block py-2 pl-3 pr-10 mt-1 text-black border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
              @foreach($funcionarios as $funcionario)
                <option value="{{$funcionario['cedulaFuncionario']}}">{{$funcionario['cedulaFuncionario']}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <label for="nombre" class="block mb-1 text-black-800">Cantidad de productos</label>
        <input type="number" name="cantidadProductos" class="block py-2 pl-3 pr-10 mt-1 text-black border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
        <label for="nombre" class="block mb-1 text-black-800">Nodo destino</label>
        <select name="idNodo" class="text-black">
          @foreach ($nodos as $nodo)
          <option value="{{$nodo->idNodos}}">Nodo {{$nodo->nombreNodo}}</option>
          @endforeach
        </select>
        {{-- <label for="fechaLLegada" name="fechaLlegada" class="block mb-1 text-black-800">Hora de llegada</label>
        <input type="date" name="fechaLlegada" class="block py-2 pl-3 pr-10 mt-1 text-black border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"> --}}
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
@endsection