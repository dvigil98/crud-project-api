<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

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

Route::prefix('v1')->group(function () {

    // clientes
    Route::get('/clientes', [ClienteController::class, 'obtenerClientes']);
    Route::post('/clientes', [ClienteController::class, 'guardarCliente']);
    Route::get('/clientes/{id}', [ClienteController::class, 'obtenerClientePorId']);
    Route::put('/clientes/{id}', [ClienteController::class, 'actualizarCliente']);
    Route::delete('/clientes/{id}', [ClienteController::class, 'eliminarCliente']);
    Route::get('/clientes/{id}/detalles', [ClienteController::class, 'obtenerDetallesDeCliente']);
    Route::get('/clientes/buscar/{tipo}/{texto}', [ClienteController::class, 'buscarClientes']);

});
