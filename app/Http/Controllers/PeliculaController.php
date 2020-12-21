<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Artista;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        if(auth()->user()) {
            $peliculas = Pelicula::where('user_id',auth()->user()->id)->simplePaginate();
            //dd($peliculas);
        } 
        else 
            $peliculas = Pelicula::simplePaginate();            
        //$peliculas = Pelicula::paginate(15);
        return view('peliculas.index',["peliculas" => $peliculas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $directores = Artista::all();
        return view('peliculas.create',["directores" => $directores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if(!auth()->user())             abort(401);

        $validated = $request->validate([
            'titulo' => 'required',
            'fecha_estreno' => 'required',
            'rating' => 'required',
            'idioma' => 'required',
            'director' => 'required',
            'resumen' => 'required',
            'poster' => 'required|max:2000',
        ]);
        
        $pelicula = new Pelicula();
        $pelicula->titulo = request('titulo');
        $pelicula->fecha_estreno = request('fecha_estreno');
        $pelicula->rating = request('rating');
        $pelicula->todo_publico = request('todo_publico');
        $pelicula->idioma = request('idioma');
        //$pelicula->director_id = request('director');
        $pelicula->resumen = request('resumen');        
        $pelicula->imagen = "/".request('poster');
        $pelicula->user_id = auth()->user()->id;
        
        $pelicula->save();

        return redirect()->route('peliculas.index')->with("status","movie-created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        return view('peliculas.show',["pelicula" => $pelicula]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd("edit");
        redirect('welcome');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd("destoryed");
        redirect('welcome');
    }
}
