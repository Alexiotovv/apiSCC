<?php

namespace App\Http\Controllers;

use App\Models\direcciones;
use Illuminate\Http\Request;

class DireccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $obj= direcciones::all()->select('id','nombre');
        return response()->json(['status'=>'success','data'=>$obj],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj = new direcciones();
        $obj->nombre=request('nombre');
        $obj->save();
        return response()->json(['status'=>'success','message'=>'Direccion Registrada'],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(regiones $regiones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(regiones $regiones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $obj = direcciones::findOrFail($id);
        $obj->nombre=request('nombre');
        $obj->save();
        return response()->json(['status'=>'success','message'=>'Direccion Actualizada'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(regiones $regiones)
    {
        //
    }
}
