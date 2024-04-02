<?php

namespace App\Http\Controllers;

use App\Models\expedientes;
use Illuminate\Http\Request;
use Validator;

class ExpedientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        
        $validator=Validator::make($request->all(),[
            'deudor' => 'required|integer|',
            'direccion'=> 'required|integer',
            'concepto'=>'required|string|max:250',
            'monto'=>'required|numeric',
            'expediente'=>'required|string|max:250',
            'tipo'=>'required|string|max:100',
            'numero'=>'required|string|max:250',
            'fecha'=>'required|date',
            'uit'=>'required|numeric',
            'importe'=>'required|numeric',
            'resolucion_admin'=>'required|string|max:250',
            'fecha_resolucion_admin'=>'required|date',
            'noaperturado'=>'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['status'=>'required','data'=>$validator->errors()],422);
        }
        // return response()->json(['status'=>'success','data'=>'Registro Creado'],200);
        $obj = new expedientes();
        $obj->id_deudores=request('deudor');
        $obj->id_direcciones=request('direccion');
        $obj->concepto=request('concepto');
        $obj->monto=request('monto');
        $obj->expediente=request('expediente');
        $obj->tipo=request('tipo');
        $obj->numero=request('numero');
        $obj->fecha=request('fecha');
        $obj->uit=request('uit');
        $obj->importe=request('importe');
        $obj->resolucion_admin=request('resolucion_admin');
        $obj->fecha_resolucion_admin=request('fecha_resolucion_admin');
        $obj->noaperturado=request('noaperturado');
        $obj->save();

        return response()->json(['status'=>'success','data'=>'Registro Creado'],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(coactivos $coactivos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(coactivos $coactivos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, coactivos $coactivos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(coactivos $coactivos)
    {
        //
    }
}
