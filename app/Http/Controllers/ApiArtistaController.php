<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Artista;

class ApiArtistaController extends Controller
{
    /**
     * Returns a list of actores and the movies they were in
     *
     * @return \Illuminate\Http\Response
     */
    public function getListaPeliculasPorActor()
    {        
        $aRet = DB::table('artistas')
        ->join('artista_pelicula',"artistas.id","=","artista_pelicula.artista_id")
        ->select(DB::raw('artistas.nombre as "Nombre", count(*) as "Cantidad de Peliculas"'))
        ->groupBy('artistas.nombre')
        ->orderByDesc(DB::raw('count(*)'))
        ->get();
        return $aRet;
    }
    
}
