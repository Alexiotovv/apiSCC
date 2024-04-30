<?php

namespace App\Http\Controllers;

use App\Models\vregistrals;
use Illuminate\Http\Request;
use Validator;

class VregistralsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $expediente_id)
    {
        try {
            $vr=vregistrals::where('id_expedientes',$expediente_id)->get();
            return response()->json(['status'=>'success','data'=>$vr], 200);
        } catch (\Throwable $th) {
            return response()->json(['status'=>'error','message'=>'Error de Servidor'],500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {        
            $validator=Validator::make($request->all(),[
                'expediente_id' => 'required|integer|',
                'prescrito'=> 'required|string|max:10',
                'estado'=>'required|string|max:250',
                'observaciones'=>'required|string|max:250',
            ]);

            if ($validator->fails()) {
                return response()->json(['status'=>'required','data'=>$validator->errors()],422);
            }
            
            $vr=new vregistrals();
            $vr->id_expedientes=request('expediente_id');
            $vr->prescrito=request('prescrito');
            $vr->estado=request('estado');
            $vr->observaciones=request('observaciones');
            $vr->save();

            return response()->json(['status'=>'success','message'=>'Registro Creado'],200);
        } catch (\Throwable $th) {
            return response()->json(['status'=>'error','message'=>'Error de Servidor'],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(vregistrals $vregistrals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vregistrals $vregistrals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $vregistral_id)
    {
        try {        
            $validator=Validator::make($request->all(),[
                'prescrito'=> 'required|string|max:10',
                'estado'=>'required|string|max:250',
                'observaciones'=>'required|string|max:250',
            ]);

            if ($validator->fails()) {
                return response()->json(['status'=>'required','data'=>$validator->errors()],422);
            }
            
            $vr=vregistrals::findOrFail($vregistral_id);
            $vr->prescrito=request('prescrito');
            $vr->estado=request('estado');
            $vr->observaciones=request('observaciones');
            $vr->save();

            return response()->json(['status'=>'success','message'=>'Registro Actualizado'],200);
        } catch (\Throwable $th) {
            return response()->json(['status'=>'error','message'=>'Error de Servidor'],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vregistrals $vregistrals)
    {
        //
    }
}
