@extends('layouts.actions')

@section('title', 'Lotes')

@section('object', 'Lotes')

@section("table")
<div class="relative overflow-x-auto">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 text-center">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  Encargado del lote
              </th>
              <th scope="col" class="px-6 py-3">
                  Id del lote
            </th>
              <th scope="col" class="px-6 py-3">
                  Cantidad de productos
              </th>
              <th scope="col" class="px-6 py-3">
                Acciones
            </th>
          </tr>
      </thead>
      <tbody>
@foreach($data as $item)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
            <td class="p-5">CI 46665550</td>
            <td class="p-5">{{ $item['idLotes']}}</td>
            <td class="p-5">{{ $item['cantidad']}}</td>
            <td>
                {{-- <button><a href="http://localhost:8000/api/almacen/?id=" . $item['idNodos']>Eliminar</a></button> --}}
                <button><a>Editar</a></button>
                <button><a href="productosInLote/{{$item['idLotes']}}">Ver Productos</a></button>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
</div>

<div class="grid grid-cols-4 gap-3 justify-center mt-5">
  <div class="col-span-1"></div>
  <Button class="my-3 col-span-1 bg-orange-400 py-3 px-5 rounded-xl"><a href="/crearLote">Crear Lote</a></Button>
  <Button class="my-3 col-span-1 bg-orange-400 py-3 px-5 rounded-xl"><a href="/loteInCoche">Ver Lotes en camion</a></Button>
  <div class="col-span-1"></div>
</div>
<div class="flex justify-center mt-8">
  <Button class="bg-orange-400 py-3 px-5 rounded-xl"><a href="/insertLoteInCoche">Insertar lote en camion</a></Button>
</div>
@endsection