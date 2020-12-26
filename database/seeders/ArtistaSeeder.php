<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artista;
use Illuminate\Support\Facades\Http;

class ArtistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$api_key = "e93600d650e78eb84e718e468e63756f";
        //$guzzle->setSslVerification(false);
        for($i=1;$i<10;$i++) {
            $response = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/person/popular?api_key=e93600d650e78eb84e718e468e63756f&language=es-ES&page='.$i)['results'];        
            foreach($response as $artista) {
                $nombre = $artista['name'];
                $genero = $artista['gender']; //1 es mujer y 2 es hombre
                $foto = $artista['profile_path'];
                Artista::create([
                    "nombre" => $nombre,
                    "genero" => $genero,
                    "foto" => "https://image.tmdb.org/t/p/w600_and_h900_bestv2".$foto
                    ]);
            }
        }
        
    }
}
