@extends('layouts.main')

@section('title', 'Usuarios')

@section('form')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Cedula
                </th>
                <th scope="col" class="px-6 py-3">
                    Tipo de usuario
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Mail
                </th>
                <th scope="col" class="px-6 py-3">
                    Telefono
                </th>
                <th scope="col" class="px-6 py-3">
                    Accion
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->cedulaUsuario}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->tipoUsuario}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->nombreUsuario}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->mail}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->telefono}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
@endsection