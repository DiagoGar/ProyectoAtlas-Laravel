<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CamioneroController extends Controller
{
  // public function __construct()
  // {
  //   $this->middleware('auth:api');
  // }

  public function HojaDeRuta()
  {
  }

  // public function verMapa(Request $request)
  // {
  //   if ($request->origin && $request->origin !== '') {
  //     $origin = $request->origin;
  //     $destination = $request->destination;
  //     $destinationConvert = strtr($destination, " ", "+");
  //     $originConvert = strtr($origin, " ", "+");
  //     $url = 'https://maps.googleapis.com/maps/api/directions/json?origin=' .$originConvert . '&destination=' . $destinationConvert . '&key=AIzaSyD3zJVr4jqU-cOuELY32KrBvkTXSiK2mU0';
  //   }else{
  //     $destination = $request->destination;
  //     $destinationConvert = strtr($destination, " ", "+");
  //     $url = 'https://maps.googleapis.com/maps/api/directions/json?origin=republica+dominicana+3026+Montevideo&destination=' . $destinationConvert . '&key=AIzaSyD3zJVr4jqU-cOuELY32KrBvkTXSiK2mU0';
  //   }
    
  //   $response = Http::get($url);
    
  //   $data =  $response->json();

  //   foreach ($data['routes'][0]['legs'][0]['steps'] as $step) {
  //     $htmlInstructions = $step['html_instructions'];
  //     $instruction[] = $htmlInstructions;
  //   }
  //   return $instruction;
  // }
}
