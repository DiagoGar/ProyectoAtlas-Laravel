@extends('layouts.almacenes')

@section('nombre')
@foreach($almacenes as $item)
Nombre: {{ $item['nombre']}} <br>
Rut: {{ $item['rut']}} <br>
Direccion: {{ $item['direccionAlmacen']}} <br>
@endforeach
@endsection