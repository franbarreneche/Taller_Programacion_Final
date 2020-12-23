<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Http\Resources\Pelicula as PeliculaResource;

class ApiPeliculaController extends Controller
{
    /**
     * Returns a random movie from the db
     *
     * @return \Illuminate\Http\Response
     */
    public function getRandom   ()
    {        
        $peli = Pelicula::inRandomOrder()->first();
        if($peli) return new PeliculaResource($peli);
        else return false;
    }
}
