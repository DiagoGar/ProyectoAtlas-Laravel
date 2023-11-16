<?php

namespace App\Http\Controllers;

use App\Models\CamionerosCoch;
use App\Models\Coch;
use App\Models\Tipocamionero;
use Illuminate\Http\Request;
use App\Models\Tipofuncionario;
use App\Models\Usuario;

class AdminController extends Controller
{

    // ================================= Usuarios ================================= \\

    public function indexUsuario(){
        $usuario = Usuario::all();
        return $usuario;
    }

    public function Usuario(Request $request){
        $usuario = Usuario::find($request->id);
        return $usuario;
    }

    public function storeUsuario(Request $request){
        $usuario = new Usuario();
        $usuario->cedulaUsuario = $request->cedula;
        $usuario->tipoUsuario = $request->tipo;
        $usuario->nombreUsuario = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->save();
    }

    public function updateUsuario(Request $request){
        $usuario = Usuario::find($request->cedula);
        $usuario->cedulaUsuario = $request->cedula;
        $usuario->tipoUsuario = $request->tipo;
        $usuario->nombreUsuario = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->save();
    }

    // ================================= Funcionarios ================================= \\

    public function indexFuncionario(){
        $funcionario = Tipofuncionario::all();
        return $funcionario;
    }

    public function Funcionario(Request $request){
        $funcionario = Tipofuncionario::find($request->id);
        return $funcionario;
    }

    public function storeFuncionario(Request $request){
        $funcionario = new Tipofuncionario();
        $funcionario->cedulaFuncionario = $request->cedula;
        $funcionario->cargo = $request->cargo;
        $funcionario->save();
    }

    public function updateFuncionario(Request $request){
        $funcionario = Tipofuncionario::find($request->cedula);
        $funcionario->cedulaFuncionario = $request->cedula;
        $funcionario->cargo = $request->cargo;
    }

    // ================================= Camioneros ================================= \\

    public function indexCamioneros(){
        $camioneros = Tipocamionero::all();
        return $camioneros;
    }

    public function Camionero(Request $request){
        $funcionario = Tipofuncionario::find($request->id);
        return $funcionario;
    }

    public function storeCamionero(Request $request){
        $funcionario = new Tipofuncionario();
        $funcionario->cedulaFuncionario = $request->cedula;
        $funcionario->cargo = $request->cargo;
        $funcionario->save();
    }

    public function updateCamionero(Request $request){
        $funcionario = Tipofuncionario::find($request->id);
        $funcionario->cedulaFuncionario = $request->cedula;
        $funcionario->cargo = $request->cargo;
    }

    // ================================= Coches ================================= \\

    public function indexCoche(){
        $coche = Coch::all();
        return $coche;
    }

    public function Coche(Request $request){
        $coche = Coch::find($request->patente);
        return $coche;
    }

    public function storeCoche(Request $request){
        $coche = new Coch();
        $coche->patente = $request->patente;
        $coche->tipoCoche = $request->tipo;
        $coche->save();
    }

    public function updateCoche(Request $request){
        $coche = Coch::find($request->patente);
        $coche->patente = $request->patente;
        $coche->tipoCoche = $request->tipo;
    }

    // ================================= Coches_coches ================================= \\

    public function indexCC(){
        $cc = CamionerosCoch::all();
        return $cc;
    }

    public function CC(Request $request){
        $cc = CamionerosCoch::find($request->patente, $request->patente);
        return $cc;
    }

    public function storeCC(Request $request){
        $cc = new CamionerosCoch();
        $cc->cedulaCamionero = $request->cedula;
        $cc->patente = $request->patente;
        $cc->save();
    }

    public function updateCC(Request $request){
        $cc = CamionerosCoch::find($request->patente, $request->patente);
        $cc->patente = $request->patente;
        $cc->tipoCoche = $request->tipo;
        $cc->save();
    }

}
