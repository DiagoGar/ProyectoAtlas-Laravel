@extends('layouts.main')

@section('title', 'Panel administrativo')

@section('form')
<div class="grid grid-cols-2 gap-6 mt-64">
    <div class="bg-blue-500 p-5 text-white transition-transform transform hover:scale-105 text-center"><a href="/admin/funcionarios">Funcionarios</a></div>

    <div class="bg-green-500 p-5 text-white transition-transform transform hover:scale-105 text-center"><a href="#">Camioneros</a></div>

    <div class="bg-yellow-500 p-5 text-white transition-transform transform hover:scale-105 text-center"><a href="#">Camiones</a></div>

    <div class="bg-red-500 p-5 text-white transition-transform transform hover:scale-105 text-center"><a href="#">Nodos</a></div>
</div>
@endsection