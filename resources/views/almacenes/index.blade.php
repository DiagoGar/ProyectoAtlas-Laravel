@extends('layouts.almacenes')

@section('table')
<div class="relative overflow-x-auto">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  Nombre
              </th>
              <th scope="col" class="px-6 py-3">
                  RUT
              </th>
              <th scope="col" class="px-6 py-3">
                  DIrección
              </th>
              <th>
                Accion
              </th>
          </tr>
      </thead>
      <tbody>
@foreach($almacenes as $item)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="p-5">{{ $item['nombre']}}</td>
            <td class="p-5">{{ $item['rut']}}</td>
            <td class="p-5">{{ $item['direccionAlmacen']}}</td>
            <td>
                <button><a>Eliminar</a></button>
                <button><a>Editar</a></button>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
</div>
@endsection