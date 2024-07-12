<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pagos;
use App\Models\cronogramas;
use Validator;
use Carbon\Carbon;
use DB;

class PagosController extends Controller
{

    public function index(Request $request, $cronograma_id){

        $pagos = pagos::where('id_cronograma',$cronograma_id)->get();
        return response()->json(['status'=>'success','data'=>$pagos], 200);
    }

    public function calcularEstadoCronograma($id){
        // Obtener el cronograma por su ID
        $cronograma = cronogramas::find($id);
    
        if (!$cronograma) {
            return "El cronograma con ID $id no existe."; // Manejo de caso donde no se encuentra el cronograma
        }
    
        // Calcular el monto total a pagar
        $monto_total_a_pagar = $cronograma->monto_pagar * $cronograma->numero_cuotas;
    
        // Obtener la suma de los pagos realizados para este cronograma
        $total_pagos = DB::table('pagos')
                        ->where('id_cronograma', $id)
                        ->sum('monto');
    
        // Comparar el total de pagos con el monto total a pagar del cronograma
        if ($total_pagos >= $monto_total_a_pagar) {
            return true;
        } else {
            return false;
        }
    }
    


    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'id_cronograma'=>'required|integer',
            //id_user del backend
            'monto'=>'required|numeric|regex:/^\d{1,10}(\.\d{1,2})?$/',
            'metodo'=>'required|string',
            'estado'=>'required|int',
            //fecha del backend
            //hora del backend
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>'required','message'=>$validator->errors()],422);
        }
        
        $date = Carbon::now();
        $pago = new pagos();
        $pago->id_cronograma=request('id_cronograma');
        $pago->id_user=auth()->user()->id;
        $pago->monto=request('monto');
        $pago->metodo=request('metodo');
        $pago->estado=request('estado');
        $pago->fecha=$date->toDateString();
        $pago->hora=$date->toTimeString();
        if ($request->hasFile('archivo')){
            $file = request('archivo')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('archivo')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('archivo')->storeAs('comprobantes/',$archivo,'public');//refiere carpeta publica es el nombre de disco
            $pago->archivo = $archivo;
        }
        $pago->save();
        
        $id_cronograma = request('id_cronograma');
        $estado_cronograma = $this->calcularEstadoCronograma($id_cronograma); // Asegúrate de llamar correctamente a la función
        
        if ($estado_cronograma) {
            $cronograma = cronogramas::findOrFail($id_cronograma);
            $cronograma->estado = true; // Actualiza el estado del cronograma
            $cronograma->save(); // Guarda los cambios en la base de datos
        }
        return response()->json(['status'=>'success','message'=>'Pago Registrado'], 200);
    }

    public function update(Request $request,$id){
        $validator=Validator::make($request->all(),[
            
            //id_user del backend
            'monto'=>'required|numeric|regex:/^\d{1,10}(\.\d{1,2})?$/',
            'metodo'=>'required|string',
            'estado'=>'required|int',
            //fecha del backend
            //hora del backend
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>'required','message'=>$validator->errors()],422);
        }
        
        $date = Carbon::now();
        $pago = pagos::findOrFail($id);
        $pago->id_user=auth()->user()->id;
        $pago->monto=request('monto');
        $pago->metodo=request('metodo');
        $pago->estado=request('estado');
        $pago->fecha=$date->toDateString();
        $pago->hora=$date->toTimeString();
        if ($request->hasFile('archivo')){
            $file = request('archivo')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('archivo')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('archivo')->storeAs('comprobantes/',$archivo,'public');//refiere carpeta publica es el nombre de disco
            $pago->archivo = $archivo;
        }
        $pago->save();
        return response()->json(['status'=>'success','message'=>'Pago Actualizado'], 200);
        
    }
}
