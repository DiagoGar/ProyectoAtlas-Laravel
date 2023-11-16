@extends('layouts.main')

@section('title', 'Panel administrativo')

@section('form')
    
<form class="bg-orange-500 p-5 rounded-xl" action="{{ url('/admin/EditarFuncionario') }}" method="GET">
    @csrf
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="cedula" class="block mb-2 text-sm font-medium text-black-900 ">Cedula:</label>
            <input type="text" value="{{$funcionario->cedulaFuncionario}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div>
            <label for="cargo" class="block mb-2 text-sm font-medium text-black-900 ">Cargo</label>
            <input type="text" name="cargo" value="{{$funcionario->cargo}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
    </div>
     
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>

@endsection