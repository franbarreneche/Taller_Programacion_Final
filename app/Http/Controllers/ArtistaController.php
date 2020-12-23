<?php

namespace App\Http\Controllers;

use App\Models\Artista;

class ArtistaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $artistas = Artista::orderBy('nombre')->simplePaginate();
        return view('artistas.index',["artistas" => $artistas]);
    }


     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artista = Artista::findOrFail($id);
        return view('artistas.show',["artista" => $artista]);
    }
}
