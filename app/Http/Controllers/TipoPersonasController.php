<?php

namespace App\Http\Controllers;

use App\Models\tipo_personas;
use Illuminate\Http\Request;

class TipoPersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipopersonas=tipo_personas::all()->select('id','codigo','nombre');
        return response()->json(['status'=>'success','data'=>$tipopersonas], 200);
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
        //
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
    public function update(Request $request, regiones $regiones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(regiones $regiones)
    {
        //
    }
}
