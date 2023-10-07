@extends('layouts.almacenes')

@section('title', 'Productos')

@section('object', 'Productos')

@section("table")
<div class="relative overflow-x-auto">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 text-center">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  Id Productos
              </th>
              <th scope="col" class="px-6 py-3">
                  Nombre producto
            </th>
              <th scope="col" class="px-6 py-3">
                  Peso del producto
              </th>
              <th scope="col" class="px-6 py-3">
                Acciones
            </th>
          </tr>
      </thead>
      <tbody>
@foreach($data as $item)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
            <td class="p-5">{{ $item['idProductos']}}</td>
            <td class="p-5">{{ $item['nobreProducto']}}</td>
            <td class="p-5">{{ $item['pesoProducto']}} Kg</td>
            <td>
                {{-- <button><a href="http://localhost:8000/api/almacen/?id=" . $item['idNodos']>Eliminar</a></button> --}}
                <button><a href="#">Eliminar</a></button>
                <button><a>Editar</a></button>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
</div>

<div class="text-center">
  <Button><a href="#">Agregar Producto</a></Button>
</div>

@endsection