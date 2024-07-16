<?php

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

use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',function(){
    return view('auth.login');
})->name('credentials');

Route::middleware('auth:api')->get('/check-auth', [App\Http\Controllers\AuthController::class, 'checkAuth']);

//Home
Route::middleware('jwt.auth')->get('/home', [HomeController::class, 'index'])->name('home');

//Register and Login user
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('jwt.auth')->get('/logout', [AuthController::class, 'logout'])->name('logout');