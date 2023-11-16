<?php

namespace App\Http\Controllers;

use App\Models\CamionerosCoch;
use App\Models\Coch;
use App\Models\Tipocamionero;
use Illuminate\Http\Request;
use App\Models\Tipofuncionario;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    // ================================= Usuarios ================================= \\

    public function indexUsuario(){
        $usuario = Usuario::all();
        return view('admin.usuario.Usuarios', ['data' => $usuario]);
    }

    public function Usuario(Request $request){
        $usuario = Usuario::find($request->cedula);
        return $usuario;
        return view('admin.usuario.Usuario', ['data' => $usuario]);
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
        $funcionario = Tipofuncionario::find($request->cedula);
        return $funcionario;
    }

    public function viewStoreFuncionario(){
        $usuario = Usuario::all();
        return view('admin.funcionario.storeFuncionario', ['usuario' => $usuario]);
    }

    public function storeFuncionario(Request $request){
        try{
            DB::beginTransaction();
            $funcionario = new Tipofuncionario();
            $funcionario->cedulaFuncionario = $request->cedula;
            $funcionario->cargo = $request->cargo;
            $funcionario->save();

            DB::commit();
            return redirect('/funcionarios');
        }catch(\Exception $e){
            DB::rollBack();
            return "No se puedo crear este usuario: verifique que este usuario no sea de otro tipo";
        }
    }

    public function viewUpdateFuncionario(Request $request){
        $funcionario = Tipofuncionario::find($request->cedula);
        return view('admin.funcionario.updateFuncionario', ['funcionario' => $funcionario]);
    }

    public function updateFuncionario(Request $request){
        try{
            DB::beginTransaction();
            $funcionario = Tipofuncionario::find($request->cedula);
            $funcionario->cedulaFuncionario = $request->cedula;
            $funcionario->cargo = $request->cargo;

            DB::commit();
            return redirect('/funcionarios');
        }catch(\Exception $e){
            DB::rollBack();
            return "No se puedo editar a este usuario: verifique los datos que ingreso";
        }
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
