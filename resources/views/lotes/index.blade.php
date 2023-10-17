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
                  Id Lote
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

<div class="text-center my-5">
  <Button class="my-3 bg-orange-400 py-3 px-5 rounded-xl"><a href="#">Crear Lote</a></Button>
</div>

@endsection