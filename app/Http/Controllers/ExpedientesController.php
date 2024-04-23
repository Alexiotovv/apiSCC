<?php

namespace App\Http\Controllers;

use App\Models\expedientes;
use Illuminate\Http\Request;
use Validator;
use DB;
class ExpedientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $itemsPerPage = 1, int $page =1)
    {
        $expedientes=DB::table('expedientes')
        ->leftjoin('deudores','deudores.id','=','expedientes.id_deudores')
        ->leftjoin('direcciones','direcciones.id','=','expedientes.id_direcciones')
        ->select(
            'deudores.nombre',
            'deudores.apellidos',
            'direcciones.nombre as dirección',
            'expedientes.concepto',
            'expedientes.monto',
            'expedientes.expediente',
            'expedientes.fecha',
            'expedientes.uit',
            'expedientes.importe',
            'expedientes.resolucion_admin',
            'expedientes.fecha_resolucion_admin',
            'expedientes.noaperturado',
            'expedientes.archivo',
            'expedientes.created_at')
        ->paginate($itemsPerPage, ['*'], 'page', $page);
        return response()->json([
            'status'=>'success',
            'data'=>$expedientes->items(),
            'total_items'=>$expedientes->total()],200);

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
        $obj->fecha=request('fecha');
        $obj->uit=request('uit');
        $obj->importe=request('importe');
        $obj->resolucion_admin=request('resolucion_admin');
        $obj->fecha_resolucion_admin=request('fecha_resolucion_admin');
        $obj->noaperturado=request('noaperturado');


        if ($request->hasFile('archivo')){
            $file = request('archivo')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('archivo')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('archivo')->storeAs('expedientes/',$archivo,'public');//refiere carpeta publica es el nombre de disco
            $obj->archivo = $archivo;
        }

        $obj->save();

        return response()->json(['status'=>'success','data'=>'Registro Creado'],200);
    }

    /**
     * Display the specified resource.
     */
    public function show($numero)
    {
        $expediente=DB::table('expedientes')
        ->leftjoin('deudores','deudores.id','=','expedientes.id_deudores')
        ->leftjoin('direcciones','direcciones.id','=','expedientes.id_direcciones')
        ->select(
            'expedientes.id',
            'deudores.nombre',
            'deudores.apellidos',
            'direcciones.nombre as dirección',
            'expedientes.concepto',
            'expedientes.monto',
            'expedientes.expediente',
            'expedientes.fecha',
            'expedientes.uit',
            'expedientes.importe',
            'expedientes.resolucion_admin',
            'expedientes.fecha_resolucion_admin',
            'expedientes.noaperturado',
            'expedientes.archivo'
            )
        ->whereRaw('LEFT(expedientes.expediente, 8) = ?', [$numero])
        ->get();
        return response()->json(['status'=>'success','data'=>$expediente], 200);
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
    public function update(Request $request,$numero)
    {
        $validator=Validator::make($request->all(),[
            'direccion'=> 'required|integer',
            'concepto'=>'required|string|max:250',
            'monto'=>'required|numeric',
            'expediente'=>'required|string|max:250',
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
        $obj = expedientes::findOrFail($id);
        $obj->id_direcciones=request('direccion');
        $obj->concepto=request('concepto');
        $obj->monto=request('monto');
        $obj->expediente=request('expediente');
        $obj->fecha=request('fecha');
        $obj->uit=request('uit');
        $obj->importe=request('importe');
        $obj->resolucion_admin=request('resolucion_admin');
        $obj->fecha_resolucion_admin=request('fecha_resolucion_admin');
        $obj->noaperturado=request('noaperturado');


        if ($request->hasFile('archivo')){
            $file = request('archivo')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('archivo')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('archivo')->storeAs('expedientes/',$archivo,'public');//refiere carpeta publica es el nombre de disco
            $obj->archivo = $archivo;
        }

        $obj->save();

        return response()->json(['status'=>'success','data'=>'Registro Actualizado'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(coactivos $coactivos)
    {
        //
    }
}
