<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Artista;
use App\Models\Genero;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class PeliculaController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $peliculas = Pelicula::where('user_id',auth()->user()->id)->orderByDesc('created_at')->simplePaginate();           
        return view('peliculas.index',["peliculas" => $peliculas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos = Genero::all();
        $directores = Artista::all();
        return view('peliculas.create',["artistas" => $directores, "generos" => $generos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $validated = $request->validate([
            'titulo' => 'required',
            'fecha_estreno' => 'required',
            'rating' => 'required',
            'idioma' => 'required',
            'director' => 'required',
            'resumen' => 'required',
            'poster' => 'mimes:jpeg,bmp,png',
            'actores' => 'required|array|min:2',
            'generos' => 'required|array|min:2'   
        ]);
        
        $pelicula = new Pelicula();
        $pelicula->titulo = request('titulo');
        $pelicula->fecha_estreno = request('fecha_estreno');
        $pelicula->rating = request('rating');
        $pelicula->todo_publico = request('todo_publico')? true : false;
        $pelicula->idioma = request('idioma');
        $pelicula->director_id = request('director');
        $pelicula->resumen = request('resumen');        
        
        if($request->file('poster')) {
           $path = $request->file('poster')->store("public/posters");
           $aux = explode("/",$path);
           $pelicula->poster = array_pop($aux);
        }
        //ponemos al usuario
        $pelicula->user_id = auth()->user()->id;
        
        //guardamos en la BD
        $pelicula->save();

        //ponemos los generos
        $generos = request('generos');
        $pelicula->generos()->attach($generos);

        //ponemos los actores
        $actores = request('actores');
        $pelicula->actores()->attach($actores);

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
        $peli = Pelicula::findOrFail($id);
        if(auth()->user()->id !== $peli->user_id) abort(401);
        $generos = Genero::all();
        $directores = Artista::all();
        return view('peliculas.edit',["artistas" => $directores, "generos" => $generos,"pelicula" => $peli]);
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
        $pelicula = Pelicula::findOrFail($id);
        if(auth()->user()->id !== $pelicula->user_id) abort(401);
        
        $validated = $request->validate([
            'titulo' => 'required',
            'fecha_estreno' => 'required',
            'rating' => 'required',
            'idioma' => 'required',
            'director' => 'required',
            'resumen' => 'required',
            'poster' => 'mimes:jpeg,bmp,png',
            'actores' => 'required|array|min:2',
            'generos' => 'required|array|min:2'   
        ]);
                
        $pelicula->titulo = request('titulo');
        $pelicula->fecha_estreno = request('fecha_estreno');
        $pelicula->rating = request('rating');
        $pelicula->todo_publico = request('todo_publico')? true : false;
        $pelicula->idioma = request('idioma');
        $pelicula->director_id = request('director');
        $pelicula->resumen = request('resumen');        
        
        if($request->file('poster')) {
            $poster = $pelicula->poster;
            //si tenia un poster en el almacenamiento interno lo eliminamos
            if($poster || !(filter_var($poster, FILTER_VALIDATE_URL))) {            
                Storage::delete("public/posters/".$poster);
            }
            //agregamos el nuevo poster
           $path = $request->file('poster')->store("public/posters");
           $aux = explode("/",$path);
           $pelicula->poster = array_pop($aux);
        }
                
        //guardamos en la BD
        $pelicula->save();

        //actualizamos los generos
        $generos = request('generos');
        $pelicula->generos()->sync($generos);

        //actualizamos los actores
        $actores = request('actores');
        $pelicula->actores()->sync($actores);

        return redirect()->route('peliculas.index')->with("status","movie-edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peli = Pelicula::findOrFail($id);
        if(auth()->user()->id !== $peli->user_id) abort(401);
        $poster = $peli->poster;
        //eliminarmos la peli        
        $peli->delete();
        //si tenia un poster en el almacenamiento interno lo eliminamos
        if($poster || !(filter_var($poster, FILTER_VALIDATE_URL))) {            
            Storage::delete("public/posters/".$poster);
        }
        return redirect()->route('peliculas.index')->with("status","movie-deleted");
    }


}
