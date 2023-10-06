<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CamioneroController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:api');
  }

  public function HojaDeRuta()
  {
    
  }
}