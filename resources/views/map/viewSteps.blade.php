@extends('layouts.main')

@section('title', 'Ver Pasos')

@section('form')
  <div class="mt-64 w-4/12 bg-orange-500 p-9 rounded-xl">
    @foreach ($data as $item)
    <?php echo $item. '<br>' ?>
  @endforeach
  </div>
@endsection