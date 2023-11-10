@extends('layouts.main')

@section('title', 'Mapa')

@section('form')
<form action="/viewMap" method="GET" class="mt-64 text-center">
  <button id="btn" class="mb-9 w-6/12">AVISO</button>
    <script>
      $(document).ready(function () {
        $("#btn").click(function (e) {
          e.preventDefault()
          alert(
            "Si no ingresas una dirección de origen, se tomará por defecto el nodo principal de QuickCarry"
          );
        });
      });
    </script>
  @csrf
  <div class="max-w-2xl mx-auto p-6 rounded-md shadow-lg flex justify-between bg-orange-500">
    <div class="w-1/2 mr-4">
      <h3 class="text-xl font-bold mb-2">Inserte los puntos</h3>
      <div class="mb-4">
        <label for="origin" class="block mb-1 text-black-800">Punto de partida</label>
        <div class="mt-1 relative">
          <input type="text" name="origin" class="text-black">
        </div>
      </div>
      <div class="mb-4">
        <label for="destination" class="block mb-1 text-black-800">Punto de llegada</label>
        <div class="mt-1 relative">
          <select name="destination">
            @foreach ($data as $item)
            <option value="{{$item['ciudad'] . " " . $item['calle']}}" class="text-black-800">Nodo {{$item['ciudad'] . " " . $item['calle']}}</option>
            @endforeach
          </select>
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