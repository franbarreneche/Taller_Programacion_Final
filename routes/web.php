<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\WelcomeController;

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
Route::get('/', [WelcomeController::class,'welcome'])->name('welcome');


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

//rutas para ver todos los artistas y la info de un artista (entre ellas peliculas en las que participó)
Route::get('artistas',[ArtistaController::class,'index'])->name('artistas.index');
Route::get('artistas/{id}',[ArtistaController::class,'show'])->name('artistas.show');
