@extends('layouts.almacenes')

{{-- @section('nombre')
    <h3>Nombre: <?php echo $nombreNodo;?></h3>
@endsection

@section('rut')
    <h3>Rut: <?php echo $rut;?></h3>
@endsection

@section('direccionAlmacen')
    <h3>Direccion: <?php echo $direccionAlmacen;?></h3>
@endsection --}}

@section('table')
<div class="relative overflow-x-auto">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
                Nombre 
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
            <th scope="col" class="px-6 py-3">
                ultimo nodo? 
             </th>
          </tr>
      </thead>
      <tbody>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="p-5"><?php echo $nombreNodo?></td>
            <td class="p-5"><?php echo $calle?></td>
            <td class="p-5"><?php echo $numeroPuerta?></td>
            <td class="p-5"><?php echo $ciudad?></td>
            <td class="p-5"><?php echo $rutaAcceso?></td>
            <td class="p-5"><?php 
                if ($esFinal == 1) {
                    echo 'si';
                }else {
                    echo 'no';
                }
            ?></td>
          </tr>
      </tbody>
  </table>
</div>

@endsection