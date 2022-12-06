<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\CodigoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CambiarPassController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/docentes/{matricula}',[DocenteController::class,'show']);

Route::get('/estudiantes',[EstudianteController::class,'obtenerEstudiantes']);

//Cambiar contraseña
Route::put('/cambiarpass',[CambiarPassController::class,'cambiarpass']);
//codigo de verificacion
Route::post('/codigoverificacion',[CodigoController::class,'codigoVerificacion']);
//login
Route::post('/login',[Login::class,'login']);

//crud usuarios
Route::get('/usuarios',[UsuarioController::class,'obtenerAllUsuarios']);
Route::get('/usuarios/{id}',[UsuarioController::class,'obtenerUsuarios']);
Route::post('/usuarios',[UsuarioController::class,'crearUsuarios']);
Route::put('/usuarios/{id}',[UsuarioController::class,'modificarUsuarios']);
Route::delete('/usuarios/{id}',[UsuarioController::class,'eliminarUsuarios']);
//crud productos
Route::get('/productos',[productcontroller::class,'obtenerProducto']);
Route::get('/productos/{id}',[productcontroller::class,'obtener1']);
Route::post('/productos',[productcontroller::class,'crearProductos']);
Route::put('/productos/{id}',[productcontroller::class,'modificarProducto']);
Route::delete('/productos/{id}',[productcontroller::class,'eliminarProducto']);
//crud ventas
Route::get('/ventas',[VentaController::class,'obtenerVenta']);
Route::get('/ventas/{id}',[VentaController::class,'obtener1']);
Route::post('/ventas',[VentaController::class,'crearVenta']);
Route::put('/ventas/{id}',[VentaController::class,'modificarVenta']);
Route::delete('/ventas/{id}',[VentaController::class,'eliminarVenta']);

Route::get('/citas',[CitaController::class,'index']);
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //return $request->user();
//});

//Route::middleware('auth:sanctum')->group(function(){


//});

