<?php

use App\Http\Controllers\Api\ContactosController;
use App\Http\Controllers\Api\UsuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/usuarios1',[UsuariosController::class,'read']);
Route::post('/usuarios2',[UsuariosController::class,'create']);
Route::put('/usuarios3',[UsuariosController::class,'update']);
Route::delete('/usuarios4',[UsuariosController::class,'delete']);


Route::get('/peticion',[ContactosController::class, 'read']);
Route::post('/crear',[ContactosController::class,'create']);
Route::put('/actualizar',[ContactosController::class,'update']);
Route::delete('/eliminar',[ContactosController::class,'delete']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
