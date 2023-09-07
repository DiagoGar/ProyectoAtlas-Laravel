<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
// use App\Models\Usuarios;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function register(Request $request){
        //validacion de datos
        $request->validate([
            'cedulaUsuario' => 'required',
            'nombreUsuario' => 'required|string|max:255',
            'mail' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'tipoUsuario' => 'required|string'
        ]);

        // alta de usuario

        $user = new Usuario();
        $user -> cedulaUsuario = $request->cedulaUsuario;
        $user -> nombreUsuario = $request->nombreUsuario;
        $user -> mail = $request->mail;
        $user -> password = Hash::make($request->password);
        $user -> tipoUsuario = $request->tipoUsuario;
        $user->save();

        // $user = Usuario::create([
        //     'cedulaUsuario' => $request->cedulaUsuario,
        //     'nombreUsuario' => $request->nombreUsuario,
        //     'tipoUsuario' => $request->userType,
        //     'mail' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        //respuesta
        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'mail' => 'required|email',
            'password' => 'required|string'
        ]);

        $credentials = $request->only('mail', 'password');

        $token = Auth::attempt($credentials);

        if(!$token){
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

        
    }

    public function userProfile(Request $request){
        return response()->json([
            'message' => 'userProfile ok',
            'userData' => auth()->user(),
        ], Response::HTTP_OK);
    }

    public function logout(Request $request){
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
