<?php

namespace App\Http\Controllers;

use App\Models\cronogramas;
use Illuminate\Http\Request;
use Validator;

class CronogramasController extends Controller
{

    public function index()
    {
        
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        try {
            
            $validator=Validator::make($request->all(),[
                'id_expediente'=> 'required|integer',
                'numero_cuotas'=>'required|integer',
                'fecha_inicial_pago'=>'required|date',
                'monto_pagar'=>'required|numeric|regex:/^\d{1,10}(\.\d{1,2})?$/',
                'interes_aplicado'=>'required|numeric|regex:/^\d{1,10}(\.\d{1,2})?$/',
            ]);
            if ($validator->fails()) {
                return response()->json(['status'=>'required','data'=>$validator->errors()],422);
            }
            $existe_cronograma= cronogramas::find(request('id_expediente'));

            if (!$existe_cronograma) {
                $cronograma = new cronogramas();
                $cronograma->id_user=auth()->user()->id;
                $cronograma->id_expedientes=request('id_expediente');
                $cronograma->numero_cuotas=request('numero_cuotas');
                $cronograma->fecha_inicial_pago=request('fecha_inicial_pago');
                $cronograma->monto_pagar=request('monto_pagar');
                $cronograma->interes_aplicado=request('interes_aplicado');
                $cronograma->save();
                return response()->json(['status'=>'success','message'=>'Registro Correcto'], 200);
            }else{
                return response()->json(['status'=>'error','message'=>'No se puede registrar otro cronograma para un expediente'], 200);
            }
        } catch (\Throwable $th) {
            return response()->json(['status'=>'error','data'=>$th], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,$expediente_id)
    {
        $cronograma=cronogramas::where('id_expedientes',$expediente_id)->first();
        
        if ($cronograma) {
            return response()->json(['status'=>'success','data'=>$cronograma], 200);
        }else{
            return response()->json(['message'=>'No Se encontraron los datos'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cronogramas $cronogramas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $cronograma_id)
    {
        try {
            
            $validator=Validator::make($request->all(),[
                'numero_cuotas'=>'required|integer',
                'fecha_inicial_pago'=>'required|date',
                'monto_pagar'=>'required|numeric|regex:/^\d{1,10}(\.\d{1,2})?$/',
                'interes_aplicado'=>'required|numeric|regex:/^\d{1,10}(\.\d{1,2})?$/',
            ]);
            if ($validator->fails()) {
                return response()->json(['status'=>'required','message'=>$validator->errors()],422);
            }

            $cronograma = cronogramas::findOrFail($cronograma_id);

            $cronograma->id_user=auth()->user()->id; 
            $cronograma->numero_cuotas=request('numero_cuotas');
            $cronograma->fecha_inicial_pago=request('fecha_inicial_pago');
            $cronograma->monto_pagar=request('monto_pagar');
            $cronograma->interes_aplicado=request('interes_aplicado');
            $cronograma->save();
            return response()->json(['status'=>'success','message'=>'Registro Actualizado'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['status'=>'error','message'=>'No se pudo encontrar el id del cronograma'], 500);
        } catch (\Throwable $th) {
            return response()->json(['status'=>'error','message'=>'no se pudo procesar la transacción'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cronogramas $cronogramas)
    {
        //
    }
}
