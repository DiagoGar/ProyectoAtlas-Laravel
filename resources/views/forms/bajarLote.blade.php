@extends('layouts.main')

@section('title', 'Paquete en Lote')

@section('form')
<form action="{{ url('/api/bajarLoteInNodo/')}}" method="POST" class="mt-64">
    @csrf
    <div
      class="max-w-2xl mx-auto p-6 rounded-md shadow-lg flex justify-between bg-orange-500"
    >
      <div class="w-1/2 mr-4">
        <h3 class="text-xl font-bold mb-2">Que lote desea bajar?</h3>
        <div class="mb-4">
          <label for="nombre" class="block mb-1 text-gray-800">Lote</label>
          <select name="idLotes" class="text-black">
            @foreach ($lote as $item)
                <option value="{{$item->idLotes}}">id:{{$item->idLotes}} __ funcionario:{{$item->cedulaFuncionario}}</option>
            @endforeach
          </select>
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
    </div>
</form>
@endsection