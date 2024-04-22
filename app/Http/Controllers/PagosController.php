<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pagos;
use Validator;
use Carbon\Carbon;

class PagosController extends Controller
{
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
