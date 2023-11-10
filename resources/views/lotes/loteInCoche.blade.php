@extends('layouts.main')

@section('title', 'Lotes en camion')

@section('form')
  <table class="mt-64">
    @foreach ($data as $item)
      <tr>
        <td>{{$item['patente']}}</td>
      </tr>
      <tr>
        <td>{{$item['idLotes']}}</td>
      </tr>
      @endforeach
    </table>
@endsection