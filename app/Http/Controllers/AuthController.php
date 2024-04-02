<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

use Validator;
use App\Models\User;
use std\Class;
use Iluminate\Support\Facades\Hash;


class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Obtener el usuario autenticado
            $token = JWTAuth::attempt($credentials);
    
            if ($token) {
                return response()->json(['status'=>'success','data'=>$user,'token' => $token]);
            } else {
                return response()->json(['error' => 'Unauthorized'], 402);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }


    public function logout()
    {
        $token = JWTAuth::getToken(); // Obtener el token JWT de la solicitud
        if ($token) {
            JWTAuth::invalidate($token); // Invalidar el token JWT
        }
        return response()->json(['data'=>'success','message' => 'Successfully logged out']);
    
        // Auth::logout(); // Cerrar sesión en la aplicación
        // return view('login');
    }

    
    
    
}
