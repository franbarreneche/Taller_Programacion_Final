<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero;
use Illuminate\Support\Facades\Http;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=e93600d650e78eb84e718e468e63756f&language=es-ES')['genres'];        
        foreach($response as $genero) {
            $nombre = $genero['name'];
            Genero::create(["nombre" => $nombre]);
        }
    }
}

