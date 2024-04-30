<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index(Request $request){
        $obj=User::all()->select('id','name','email','role','status');
        return response()->json(['status'=>'success','data'=>$obj]);
    }

    public function update(Request $request, $id){
        try {
            
            $usuario=User::findOrFail($id);
            $usuario->name=$request->input('name');
            $usuario->email=$request->input('email');
            $usuario->role=$request->input('role');
            $usuario->status=$request->input('status');
            // if (request('contra')!='') {
            //     $usuario->password=request('password');
            // }
            $usuario->save();
            return response()->json(['status'=>'success','data'=>'Registro Actualizado']);
        } catch (\Throwable $th) {
            return response()->json(['status'=>'error','message'=>'Ocurrió un erro durante la actualización']);
        }

    }

    public function register(Request $request){
        //Recepcionamos los datos para validar
        $validator=Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email'=> 'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:6',
        ]);

        //Preguntamos si hay errores en la validacion
        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        //Creamos el usuario
        $user = User::create([
            'name'=> $request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
            'role'=>$request->input('role'),
        ]);

        return response()->json(['status'=>'success','data'=>$user], 200);
    }




    public function change_status(Request $request, $user_id)
    {

        // try {

            $status_user=$request->input('status_user');
            $user = User::findOrFail($user_id);
            $user->status=$status_user;
            $user->save(); // Actualiza el estado del usuario
            return response()->json(['status'=>'success','data' => 'Status cambiado correctamente'],200);
        // } catch (\Throwable $th) {
        //     return response()->json(['status' => 'server error'],500);
        // }

    }

    public function users(Request $request){
        try {
            $users = User::all();
            return response()->json(['usuarios' => $users],200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'server error'],500);
        }
    }

}
