@extends('layouts.almacenes')

@section('title', 'Almacenes')

@section('object', 'Almacenes')

@section('table')
<div class="relative overflow-x-auto">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              idNodo
          </th>
            <th scope="col" class="px-6 py-3">
              Calle 
          </th><th scope="col" class="px-6 py-3">
              Numero puerta
          </th>
          <th scope="col" class="px-6 py-3">
              ciudad 
          </th>
          <th scope="col" class="px-6 py-3">
              Ruta acceso 
          </th>
          </tr>
      </thead>
      <tbody>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="p-5">{{$id['idNodos']}}</td>
            <td class="p-5">{{$id['calle']}}</td>
            <td class="p-5">{{$id['numeroPuerta']}}</td>
            <td class="p-5">{{$id['ciudad']}}</td>
            <td class="p-5">{{$id['rutaAcceso']}}</td>
          </tr>
      </tbody>
  </table>
</div>

@endsection