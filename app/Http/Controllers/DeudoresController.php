<?php

namespace App\Http\Controllers;

use App\Models\deudores;
use Illuminate\Http\Request;
use Validator;
use DB;

class DeudoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(int $itemsPerPage = 1, int $page =1)
    {
        $deudores = DB::table('deudores')
        ->leftjoin('tipo_personas','tipo_personas.id','=','deudores.id_tipopersonas')
        ->leftjoin('distritos','distritos.id','=','deudores.id_distritos')
        ->leftjoin('provincias','provincias.id','=','distritos.id_provincias')
        ->select(
            'deudores.id as id_deudor',
            'tipo_personas.nombre as tipo_persona',
            'provincias.id as id_provincia',
            'provincias.nombre_provincia as provincia',
            'distritos.id as id_distrito',
            'distritos.nombre_distrito as distrito',
            'deudores.dni',
            'deudores.nombre',
            'deudores.apellidos',
            'deudores.ruc',
            'deudores.razon',
            'deudores.nombre_rep',
            'deudores.apellidos_rep',
            'deudores.dni_rep',
            'deudores.domicilio',
            'deudores.created_at as fecha_registro',
        )
        ->paginate($itemsPerPage, ['*'], 'page', $page);
        
        // return response()->json($deudores, 200);
        return response()->json([
            'status'=>'success',
            'data'=>$deudores->items(),
            'total_items'=>$deudores->total()],200);
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

        $obj=new deudores();
        $obj->id_tipopersonas=request('tipopersona');
        $obj->id_distritos=request('distrito');

        if (request('tipopersona')=='1') {
            $validator=Validator::make($request->all(),[
                'dni'=>'required_if:tipopersona,1|string|size:8|',
                'nombre'=>'required_if:tipopersona,1||string|max:250',
                'apellidos'=>'required_if:tipopersona,1|string|max:250',
                'domicilio'=>'required|string|max:250',
            ]);

            if ($validator->fails()) {
                return response()->json(['status'=>'required','data'=>$validator->errors()],422);
            }
            $obj->dni=request('dni');
            $obj->nombre=request('nombre');
            $obj->apellidos=request('apellidos');
            $obj->domicilio=request('domicilio');
            $obj->ruc='';
            $obj->razon='';
            $obj->nombre_rep='';
            $obj->apellidos_rep='';
            $obj->dni_rep='';

        }else{
            $validator=Validator::make($request->all(),[
                'ruc'=>'required|string|size:11',
                'razon'=>'required_if:tipopersona,2|',
                'nombre_rep'=>'required_if:tipopersona,2|',
                'apellidos_rep'=>'required_if:tipopersona,2|',
                'dni_rep'=>'required_if:tipopersona,2|',
                'domicilio'=>'required|string|max:250',
            ]);

            if ($validator->fails()) {
                return response()->json(['status'=>'required','data'=>$validator->errors()],422);
            }

            $obj->dni='';
            $obj->nombre='';
            $obj->apellidos='';
            $obj->domicilio=request('domicilio');
            $obj->ruc=request('ruc');
            $obj->razon=request('razon');
            $obj->nombre_rep=request('nombre_rep');
            $obj->apellidos_rep=request('apellidos_rep');
            $obj->dni_rep=request('dni_rep');
        }
        $obj->save();

        return response()->json(['status'=>'success','message'=>'Registro Creado'],200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $tipopersona,$doc)
    {

        if ($tipopersona==1) {
            $deudor=deudores::where('deudores.dni',$doc)
            ->select('deudores.id','deudores.nombre as nombre','deudores.apellidos as apellidos','deudores.domicilio')
            ->first();
        }else{
            $deudor=deudores::where('deudores.ruc',$doc)
            ->select('deudores.id','deudores.nombre_rep as nombre','deudores.apellidos_rep as apellidos','deudores.domicilio')
            ->first();
        }
        if ($deudor) {
            return response()->json(['status' => 'success', 'data' => $deudor], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'No se encontró el DNI o RUC en la base de datos'], 404);
        }
            
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit(deudores $deudores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $obj=deudores::findOrFail($id);

        $obj->id_tipopersonas=request('tipopersona');
        $obj->id_distritos=request('distrito');

        if (request('tipopersona')=='1') {
            $validator=Validator::make($request->all(),[
                'dni'=>'required_if:tipopersona,1|string|size:8|',
                'nombre'=>'required_if:tipopersona,1||string|max:250',
                'apellidos'=>'required_if:tipopersona,1|string|max:250',
                'domicilio'=>'required|string|max:250',
            ]);

            if ($validator->fails()) {
                return response()->json(['status'=>'required','data'=>$validator->errors()],422);
            }
            $obj->dni=request('dni');
            $obj->nombre=request('nombre');
            $obj->apellidos=request('apellidos');
            $obj->domicilio=request('domicilio');
            $obj->ruc='';
            $obj->razon='';
            $obj->nombre_rep='';
            $obj->apellidos_rep='';
            $obj->dni_rep='';

        }else{
            $validator=Validator::make($request->all(),[
                'ruc'=>'required|string|size:11',
                'razon'=>'required_if:tipopersona,2|',
                'nombre_rep'=>'required_if:tipopersona,2|',
                'apellidos_rep'=>'required_if:tipopersona,2|',
                'dni_rep'=>'required_if:tipopersona,2|',
                'domicilio'=>'required|string|max:250',
            ]);

            if ($validator->fails()) {
                return response()->json(['status'=>'required','data'=>$validator->errors()],422);
            }

            $obj->dni='';
            $obj->nombre='';
            $obj->apellidos='';
            $obj->domicilio=request('domicilio');
            $obj->ruc=request('ruc');
            $obj->razon=request('razon');
            $obj->nombre_rep=request('nombre_rep');
            $obj->apellidos_rep=request('apellidos_rep');
            $obj->dni_rep=request('dni_rep');
        }
        $obj->save();

        return response()->json(['status'=>'success','message'=>'Registro Actualizado'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(deudores $deudores)
    {
        //
    }
}
