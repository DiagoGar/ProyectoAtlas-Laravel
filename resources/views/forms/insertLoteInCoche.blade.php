@extends('layouts.main')

@section('title', 'Lote en coche')

@section('form')
<form action="/api/loteInCoche/" method="POST" class="mt-64">
  @csrf
  <div
    class="max-w-2xl mx-auto p-6 rounded-md shadow-lg flex justify-between bg-orange-500"
  >
    <div class="w-1/2 mr-4">
      <h3 class="text-xl font-bold mb-2">Guardar lote en camion</h3>
      <div class="mb-4">

        <div class="max-w-md mx-auto bg-white rounded-md p-6 shadow-md w-96">

          {{-- <div class="flex flex-col items-start mt-9">
            <div class="flex justify-center items-center">
              <label for="midRutas" class="block mb-1 mx-1 text-gray-800">Movimiento id Rutas</label>
              <select name="midRutas" class="h-4 w-4 text-black border-gray-300 rounded mr-6">
                @foreach ($data['midRutas'] as $item)    
                  <option value="{{$item->idRutas}}">id: {{$item->idRutas}}</option>
                @endforeach
                </select>
              </div>
          </div> --}}
          
          {{-- <div class="flex flex-col items-start mt-9">
            <div class="flex justify-center items-center">
              <label for="midHojaDeRuta" class="block mb-1 mx-1 text-gray-800">Movimiento id hoja de rutas</label>
              <select name="midHojaDeRuta" class="h-4 w-4 text-black border-gray-300 rounded mr-6">
                @foreach ($data['movimientos'] as $item)
                  @if ($item->idHojaDeRuta !== null)
                  <option value="{{$item->idHojaDeRuta}}">id: {{$item->idHojaDeRuta}}</option>
                  @endif
                @endforeach
                </select>
              </div>
            </div> --}}
            
            <div class="flex flex-col items-start mt-9">
              <div class="flex justify-center items-center">
                <label for="fechaEstimada" class="block mb-1 mx-1 text-gray-800 mr-2">fecha estimada</label>
                <input type="date" name="fechaEstimada" class="text-black">
              </div>
            </div>

            <div class="flex flex-col items-start">
              <div class="relative">
                <button id="toggleMenu" class="bg-blue-500 text-white px-4 py-2 m-5 rounded-md w-8/12">
                  Lotes a ingresar
                </button>
                <ul id="dropdownMenu" class="hidden absolute mt-2 space-y-2 bg-white text-gray-800 rounded-md shadow-md">
                  @foreach ($data['lotes'] as $item)    
                    <div class="flex justify-center items-center">
                      <input type="checkbox" name="idLotes" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded mr-6" value="{{$item->idLotes}}">
                      <label for="example-checkbox" class="ml-2 text-sm text-gray-600">id: {{$item->idLotes}}</label>
                    </div>
                  @endforeach
                </ul>
              </div>              
            </div>

        <div class="flex flex-col items-start mt-9">
          <div class="flex justify-center items-center">
            <label for="patente" class="block mb-1 mx-1 text-gray-800">Patente del camion</label>
            <select name="patente" class="h-4 w-4 text-black border-gray-300 rounded mr-6">
              @foreach ($data['cc'] as $item)    
                <option value="{{$item->patente}}">patente: {{$item->patente}}</option>
              @endforeach
              </select>
            <label for="cedula" class="block mb-1 mx-1 text-gray-800">cedula del camionero:</label>
              <select name="cedula" class="h-4 w-4 text-black border-gray-300 rounded mr-6">
                @foreach ($data['cc'] as $item)    
                  <option value="{{$item->cedulaCamionero}}">Cedula: {{$item->cedulaCamionero}}</option>
                @endforeach
                </select>
            </div>
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

<script>
  const toggleMenuButton = document.getElementById("toggleMenu");
  const dropdownMenu = document.getElementById("dropdownMenu");

  toggleMenuButton.addEventListener("click", (e) => {
    e.preventDefault();
    dropdownMenu.classList.toggle("hidden");
  });
</script>
@endsection