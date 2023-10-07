@extends('layouts.action')

@section('title', 'Almacenes')

@section('object', 'Almacenes')

@section('table')
  <form action="/lotes" method="POST">
    <input type="text" class="block w-full text-sm text-slate-500" placeholder="Nombre nodo">
    <input type="text" class="block w-full text-sm text-slate-500" placeholder="Calle">
    <input type="text" class="block w-full text-sm text-slate-500" placeholder="Ruta de acceso">
    <input type="text" class="block w-full text-sm text-slate-500" placeholder="Ciudad">
    <input type="number" class="block w-full text-sm text-slate-500" placeholder="Numero de puerta">
    <input type="number" class="block w-full text-sm text-slate-500" placeholder="Es final? (1/0)">
  </form>
@endsection