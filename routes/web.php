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