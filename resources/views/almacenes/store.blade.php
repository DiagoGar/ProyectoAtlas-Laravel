@extends('layouts.almacenes')

@section('nombre')
    <h3>Nombre: <?php echo $nombre;?></h3>
@endsection

@section('rut')
    <h3>Rut: <?php echo $rut;?></h3>
@endsection

@section('direccionAlmacen')
    <h3>Direccion: <?php echo $direccionAlmacen;?></h3>
@endsection