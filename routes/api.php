<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeudoresController;
use App\Http\Controllers\ExpedientesController;
use App\Http\Controllers\DireccionesController;
use App\Http\Controllers\TipoPersonasController;
use App\Http\Controllers\RegionesController;
use App\Http\Controllers\GenerateTokensController;
use App\Http\Controllers\CronogramasController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\VregistralsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('jwt.auth')->post('/refresh/tokens', [GenerateTokensController::class, 'refreshTokens']);

//users
Route::middleware('jwt.auth')->post('/profile', function () { return auth()->user(); });
Route::middleware('jwt.auth')->patch('/user/change_status/{user_id}', [UserController::class,'change_status']);
Route::middleware('jwt.auth')->post('/usuario/register', [UserController::class,'register']);
Route::middleware('jwt.auth')->get('/users', [UserController::class,'users']);
Route::middleware('jwt.auth')->put('/users/update/{id}', [UserController::class,'update']);
Route::middleware('jwt.auth')->get('/users/listar/', [UserController::class,'index']);

//Expedientes
Route::middleware('jwt.auth')->post('/expedientes/register/', [ExpedientesController::class,'store']);
Route::middleware('jwt.auth')->get('/expedientes/listar/{perpage}/{page}', [ExpedientesController::class,'index']);
Route::middleware('jwt.auth')->get('/expedientes/busqueda/{numero}', [ExpedientesController::class,'show']);
Route::middleware('jwt.auth')->post('/expedientes/update/{id}', [ExpedientesController::class,'update']);

//Verificacion Registral
Route::middleware('jwt.auth')->post('/vregistral/register/', [VregistralsController::class,'store']);
Route::middleware('jwt.auth')->put('/vregistral/update/{vregistral_id}', [VregistralsController::class,'update']);
Route::middleware('jwt.auth')->get('/vregistral/listar/{expediente_id}', [VregistralsController::class,'index']);

//Cronogramas
Route::middleware('jwt.auth')->post('/cronogramas/register/', [CronogramasController::class,'store']);
Route::middleware('jwt.auth')->put('/cronogramas/update/{cronograma_id}', [CronogramasController::class,'update']);
Route::middleware('jwt.auth')->get('/cronogramas/obtener/{expediente_id}', [CronogramasController::class,'show']);

//Pagos
Route::middleware('jwt.auth')->post('/pagos/register/', [PagosController::class,'store']);
Route::middleware('jwt.auth')->post('/pagos/update/{id}', [PagosController::class,'update']);
Route::middleware('jwt.auth')->get('/pagos/listar/{cronograma_id}', [PagosController::class,'index']);

//Oficinas
Route::middleware('jwt.auth')->post('/direcciones/register/', [DireccionesController::class,'store']);
Route::middleware('jwt.auth')->put('/direcciones/update/{id}', [DireccionesController::class,'update']);
Route::middleware('jwt.auth')->get('/direcciones/listar/', [DireccionesController::class,'index']);

//Deudor 
Route::middleware('jwt.auth')->post('/deudor/register/', [DeudoresController::class,'store']);
Route::middleware('jwt.auth')->put('/deudor/update/{id}', [DeudoresController::class,'update']);
Route::middleware('jwt.auth')->get('/deudor/listar/{perpage}/{page}', [DeudoresController::class,'index']);
//Búsqueda de Deudores
Route::middleware('jwt.auth')->get('/deudor/busqueda/{tipopersona}/{doc}', [DeudoresController::class,'show']);

//No adeudo
Route::middleware('jwt.auth')->get('/carta/{id_expediente}', [ExpedientesController::class,'carta']);
Route::middleware('jwt.auth')->get('/carta/buscar/expedientes/deudor/{doc_identidad}', [ExpedientesController::class,'carta_expedientes']);


//TipoPersonas
Route::get('/tipo/personas/', [TipoPersonasController::class,'index']);

//Provincia,Distritos, Regiones
Route::get('/distritos/', [RegionesController::class,'index_distritos']);
Route::get('/provincias/', [RegionesController::class,'index_provincias']);
Route::get('/regiones/', [RegionesController::class,'index_regiones']);
