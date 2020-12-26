<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    /**
     * Display the welcome page of the site
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {       
        if (request('buscar')) $buscar = request('buscar');
        else $buscar="";
        //$peliculas = Pelicula::where("titulo","LIKE","%".$buscar."%")->orderByDesc('created_at')->simplePaginate();            
        $peliculas = DB::table('peliculas')->where('titulo','like','%'.$buscar.'%')->simplePaginate();
        $peliculas->appends(array('buscar' => request('buscar')));
        return view('welcome',["peliculas" => $peliculas]);
    }
}
