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
Route::middleware('jwt.auth')->post('/user/update/{id}', [UserController::class,'update']);
Route::middleware('jwt.auth')->get('/users/listar/', [UserController::class,'index']);

//Expedientes
Route::middleware('jwt.auth')->post('/expedientes/register/', [ExpedientesController::class,'store']);

//Direcciones
Route::middleware('jwt.auth')->post('/direcciones/register/', [DireccionesController::class,'store']);
Route::middleware('jwt.auth')->post('/direcciones/update/{id}', [DireccionesController::class,'update']);
Route::middleware('jwt.auth')->get('/direcciones/listar/', [DireccionesController::class,'index']);

//deudor 
Route::middleware('jwt.auth')->post('/deudor/register/', [DeudoresController::class,'store']);
Route::middleware('jwt.auth')->post('/deudor/update/{id}', [DeudoresController::class,'update']);
Route::middleware('jwt.auth')->get('/deudor/listar/{perpage}/{page}', [DeudoresController::class,'index']);
//Búsqueda de Deudores
Route::middleware('jwt.auth')->get('/deudor/busqueda/{tipopersona}/{doc}', [DeudoresController::class,'show']);


//TipoPersonas
Route::get('/tipo/personas/', [TipoPersonasController::class,'index']);

//Provincia,Distritos, Regiones
Route::get('/distritos/', [RegionesController::class,'index_distritos']);
Route::get('/provincias/', [RegionesController::class,'index_provincias']);
Route::get('/regiones/', [RegionesController::class,'index_regiones']);
