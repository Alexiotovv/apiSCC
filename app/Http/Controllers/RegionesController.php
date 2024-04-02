<?php

namespace App\Http\Controllers;

use App\Models\regiones;
use App\Models\distritos;
use App\Models\provincias;
use Illuminate\Http\Request;

class RegionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_distritos()
    {
        $distritos = distritos::all()->select('id','id_provincias','nombre_distrito');
        return response()->json(['status'=>'success','data'=>$distritos], 200);
    }
    public function index_provincias()
    {
        $distritos = provincias::all()->select('id','id_regiones','nombre_provincia');
        return response()->json(['status'=>'success','data'=>$distritos], 200);
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
