@extends('layouts.actions')

@section('title', 'Lotes en camion')

@section('object', 'Lotes en camion')

@section("table")
<div class="relative overflow-x-auto">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 text-center">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  Patente del camion
              </th>
              <th scope="col" class="px-6 py-3">
                  Lote
            </th>
          </tr>
      </thead>
      <tbody>
@foreach($data as $item)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
            <td class="p-5">{{ $item['patente']}}</td>
            <td class="p-5">id: {{ $item['idLotes']}}</td>
          </tr>
          @endforeach
        </tbody>
    </table>
</div>

<div class="text-center my-5">
<a href="/mapData">Ir al mapa</a>
</div>

@endsection