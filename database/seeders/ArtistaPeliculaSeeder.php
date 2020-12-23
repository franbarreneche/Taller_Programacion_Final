<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelicula;
use App\Models\Artista;

class ArtistaPeliculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $peliculas = Pelicula::all();
        foreach($peliculas as $pelicula) {
            $idsArtistas = [];
            $cant = rand(2,6);
            for($i = 0;$i<$cant;$i++) {
                array_push($idsArtistas,rand(1,Artista::all()->count()));
            }
            $pelicula->actores()->sync($idsArtistas);
        }
    }
}
