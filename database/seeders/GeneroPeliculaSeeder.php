<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelicula;
use App\Models\Genero;

class GeneroPeliculaSeeder extends Seeder
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
            $idsGeneros = [];
            $cant = rand(2,6);
            for($i = 0;$i<$cant;$i++) {
                array_push($idsGeneros,rand(1,Genero::all()->count()));
            }
            $pelicula->generos()->sync($idsGeneros);
        }
    }
}
