@extends('layouts.main')

@section('title', 'Funcionarios')

@section('form')



<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Cedula
                </th>
                <th scope="col" class="px-6 py-3">
                    Cargo
                </th>
                <th scope="col" class="px-6 py-3">
                    Accion
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                @foreach ($data as $item)
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->cedulaFuncionario}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->cargo}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>

{{-- <div class="grid grid-cols-2 gap-6 mt-64">
    <div class="bg-blue-500 p-5 text-white transition-transform transform hover:scale-105 text-center"><a href="#">Ver funcionarios</a></div>

    <div class="bg-green-500 p-5 text-white transition-transform transform hover:scale-105 text-center"><a href="#">Camioneros</a></div>

    <div class="bg-yellow-500 p-5 text-white transition-transform transform hover:scale-105 text-center"><a href="#">Camiones</a></div>

    <div class="bg-red-500 p-5 text-white transition-transform transform hover:scale-105 text-center"><a href="#">Nodos</a></div>
</div> --}}
@endsection