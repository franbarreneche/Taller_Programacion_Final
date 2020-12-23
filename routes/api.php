<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiPeliculaController;
use App\Http\Controllers\ApiArtistaController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//endpoint para obtener una pelicula aleatoria del sistema
Route::get("peliculas/random",[ApiPeliculaController::class,'getRandom']);

//endpoint para obtener lista de actores y peliculas que estuvieron
Route::get("artistas/peliculasPorActor",[ApiArtistaController::class,'getListaPeliculasPorActor']);