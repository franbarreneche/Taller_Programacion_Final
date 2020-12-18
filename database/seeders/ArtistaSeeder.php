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
            $response = Http::get('https://api.themoviedb.org/3/person/popular?api_key=e93600d650e78eb84e718e468e63756f&language=es-ES&page='.$i)['results'];        
            foreach($response as $artista) {
                $nombre = $artista['name'];
                Artista::create(["nombre" => $nombre]);
            }
        }
        
    }
}
