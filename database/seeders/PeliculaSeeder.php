<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Pelicula;


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
            $response = Http::get('https://api.themoviedb.org/3/trending/movie/week?api_key=e93600d650e78eb84e718e468e63756f&language=es-ES&page='.$i)['results'];        
            foreach($response as $pelicula) {                
                Pelicula::create([
                    "titulo" => $pelicula['title'],
                    "fecha_estreno" => $pelicula['release_date'],
                    "idioma" => $pelicula['original_language'],
                    "resumen" => $pelicula['overview'],
                    "imagen" => $pelicula['backdrop_path'],
                    "rating" => $pelicula['vote_average'],
                    "todo_publico" => ($pelicula['adult'])?false:true
                    ]);
            }
        }
    }
}
