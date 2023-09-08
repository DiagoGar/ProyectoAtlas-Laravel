@extends('layouts.almacenes')

@section('table')
<div class="relative overflow-x-auto">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  Id nodo
              </th>
              <th scope="col" class="px-6 py-3">
                  calle
            </th>
              <th scope="col" class="px-6 py-3">
                  numero de puerta
              </th>
              <th scope="col" class="px-6 py-3">
                  ciudad
              </th>
              <th scope="col" class="px-6 py-3">
                  ruta de acceso
              </th>
              <th scope="col" class="px-6 py-3">
                Accion
            </th>
          </tr>
      </thead>
      <tbody>
@foreach($nodos as $item)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="p-5">{{ $item['idNodos']}}</td>
            <td class="p-5">{{ $item['calle']}}</td>
            <td class="p-5">{{ $item['numeroPuerta']}}</td>
            <td class="p-5">{{ $item['ciudad']}}</td>
            <td class="p-5">{{ $item['rutaAcceso']}}</td>
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