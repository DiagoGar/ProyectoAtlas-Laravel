@extends('layouts.actions')

@section('title', 'Productos')

@section('object', 'Productos')

@section("table")
<div class="relative overflow-x-auto">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 text-center">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  Id de los productos
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
                <button><a href="{{ url('api/productos/' . $item['idProductos']) }}">Eliminar</a></button>
                <button><a href="{{ url('/edita-producto/' . $item['idProductos']) }}">Editar</a></button>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
</div>

<div class="text-center my-5">
  <Button class="my-3 bg-orange-400 p-3 rounded-xl"><a href="http://localhost:8080/ProyectoAtlas-Laravel/public/productosInLote">Agregar Producto</a></Button>
  <Button class="my-3 bg-orange-400 p-3 rounded-xl"><a href="http://localhost:8080/ProyectoAtlas-Laravel/public/lotes">Ver Lotes</a></Button>
</div>

@endsection