<?php

namespace App\Http\Controllers;

use App\Models\regiones;
use App\Models\distritos;
use App\Models\provincias;
use Illuminate\Http\Request;

class RegionesController extends Controller
{

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
    public function index_regiones()
    {
        $regiones = regiones::all()->select('id','nombre');
        return response()->json(['status'=>'success','data'=>$regiones], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(regiones $regiones)
    {
        //
    }

    public function edit(regiones $regiones)
    {
        //
    }

    public function update(Request $request, regiones $regiones)
    {
        //
    }

    public function destroy(regiones $regiones)
    {
        //
    }
}
