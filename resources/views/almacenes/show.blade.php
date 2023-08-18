@extends('layouts.almacenes')

@section('nombre')
  <h3>Nombre: {{$id['nombre']}}</h3> <br>
@endsection

@section('rut')
  <h3>Rut: {{$id['rut']}}</h3> <br>
@endsection

@section('direccionAlmacen')
  <h3>Direccion: {{$id['direccionAlmacen']}}</h3> <br>
@endsection