<?php

namespace App\Http\Controllers;

use App\Models\deudores;
use Illuminate\Http\Request;
use Validator;

class DeudoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deudores = deudores::all();
        $total_items=$deudores->count();
        return response()->json([
            'status'=>'success',
            'data'=>[$deudores,50],
            'total_items'=>$total_items],200);
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
            'tipopersona' => 'required|integer|',
            'distrito'=> 'required|integer',
            'ruc'=>'required|string|size:11',
            'dni'=>'required_if:tipopersona,1|string|size:8|',
            'nombre'=>'required_if:tipopersona,1||string|max:250',
            'apellidos'=>'required_if:tipopersona,1|string|max:250',
            'domicilio'=>'required|string|max:250',
            'nombre_rep'=>'required_if:tipopersona,2|',
            'apellidos_rep'=>'required_if:tipopersona,2|',
            'dni_rep'=>'required_if:tipopersona,2|',
            'razon'=>'required_if:tipopersona,2|',
        ]);
        

        
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
            ]);

            if ($validator->fails()) {
                return response()->json(['status'=>'required','data'=>$validator->errors()],422);
            }

            $obj->dni='';
            $obj->nombre='';
            $obj->apellidos='';
            $obj->domicilio='';
            $obj->ruc=request('ruc');
            $obj->razon=request('razon');
            $obj->nombre_rep=request('nombre_rep');
            $obj->apellidos_rep=request('apellidos_rep');
            $obj->dni_rep=request('dni_rep');
        }
        $obj->save();

        return response()->json(['status'=>'success','data'=>'Registro Creado'],200);

    }

    /**
     * Display the specified resource.
     */
    public function show(deudores $deudores)
    {
        //
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
        $validator=Validator::make($request->all(),[
            'tipopersona' => 'required|integer|',
            'distrito'=> 'required|integer',
            'ruc'=>'required|string|size:11',
            'dni'=>'required_if:tipopersona,1|string|size:8',
            'nombre'=>'required_if:tipopersona,1||string|max:250',
            'apellidos'=>'required_if:tipopersona,1||string|max:250',
            'domicilio'=>'required|string|max:250',
            'nombre_rep'=>'required_if:tipopersona,2|',
            'apellidos_rep'=>'required_if:tipopersona,2|',
            'dni_rep'=>'required_if:tipopersona,2|',
            'razon'=>'required_if:tipopersona,2|',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['status'=>'required','data'=>$validator->errors()],422);
        }
        
        $obj=deudores::findOrFail($id);

        $obj->id_tipopersonas=request('tipopersona');
        $obj->id_distritos=request('distrito');
        if (request('tipopersona')=='1') {
            $obj->dni=request('dni');
            $obj->nombre=request('nombre');
            $obj->apellidos=request('apellidos');
            $obj->domicilio=request('domicilio');
        }else{
            $obj->ruc=request('ruc');
            $obj->razon=request('razon');
            $obj->nombre_rep=request('nombre_rep');
            $obj->apellidos_rep=request('apellidos_rep');
            $obj->dni_rep=request('dni_rep');
        }
        $obj->save();

        return response()->json(['status'=>'success','data'=>'Registro Actualizado'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(deudores $deudores)
    {
        //
    }
}
