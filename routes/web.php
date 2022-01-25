<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Mostrar*/
Route::get('/mostrar',[PersonaController::class, 'mostrarPersona']);

/*Crear*/
Route::get('/crear',[PersonaController::class, 'crearPersona']);

Route::post('/crear',[PersonaController::class, 'crearPersonaPost']);

/*Actualizar*/
Route::get('/modificarPersona/{id}', [PersonaController::class, 'modificarPersona']);

Route::put('/modificarPersona',[PersonaController::class, 'modificarPersonaPut']);

/*Eliminar*/
Route::delete('/eliminarPersona/{id}', [PersonaController::class, 'eliminarPersona']);

/*LogIn y LogOut*/
Route::get('',[PersonaController::class, 'login']);

Route::post('login',[PersonaController::class, 'loginPost']);

Route::get('logout',[PersonaController::class, 'logout']);

/*Correo*/
Route::get('correoPersona2/{correo_persona}',[PersonaController::class, 'correoPersona2']);

Route::post('recibirCorreo',[PersonaController::class, 'correoPersona']);

/*Dinero*/
Route::get('enviarDinero/{precio}',[PersonaController::class, 'enviarDinero']);