<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Pelicula;
use App\Models\Artista;


class PeliculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<10;$i++) {
            $response = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/trending/movie/week?api_key=e93600d650e78eb84e718e468e63756f&language=es-ES&page='.$i)['results'];        
            foreach($response as $pelicula) {                
                Pelicula::create([
                    "titulo" => $pelicula['title'],
                    "fecha_estreno" => $pelicula['release_date'],
                    "idioma" => $pelicula['original_language'],
                    "resumen" => $pelicula['overview'],
                    "poster" => ($pelicula['backdrop_path'])?"https://image.tmdb.org/t/p/w600_and_h900_bestv2".$pelicula['backdrop_path']:null,
                    "rating" => $pelicula['vote_average'],
                    "todo_publico" => ($pelicula['adult'])?false:true,
                    "user_id" => ($i%2 == 0)? 1 : 2,
                    "director_id" => rand(1,Artista::all()->count())
                    ]);
            }
        }
    }
}
