<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;

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


//ruta de ingreso a la web
Route::get('/', function () {
    return view('welcome');
});


//rutas para el manejo de peliculas
Route::resource('peliculas',PeliculaController::class);


//ruta para la pagina prinicpal luego de logearse
Route::view('home', 'home')
	->name('home')
	->middleware(['auth', 'verified']);

//ligero cambio en la ruta para la actualizacion del perfil en Fortify
Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
	Route::view('profile', 'profile.show');
});
