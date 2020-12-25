<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;

class WelcomeController extends Controller
{
    /**
     * Display the welcome page of the site
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {       
        $peliculas = Pelicula::orderByDesc('created_at')->simplePaginate();            
        return view('welcome',["peliculas" => $peliculas]);
    }
}
