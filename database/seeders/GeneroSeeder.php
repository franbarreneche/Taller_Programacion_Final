<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //lista tomada de https://www.premiumbeat.com/blog/guide-to-basic-film-genres/
        Genero::create(["nombre"=>"Acción"]);   
        Genero::create(["nombre"=>"Comedia"]);
        Genero::create(["nombre"=>"Drama"]);
        Genero::create(["nombre"=>"Fantasía"]);
        Genero::create(["nombre"=>"Horror"]);
        Genero::create(["nombre"=>"Misterio"]);
        Genero::create(["nombre"=>"Romance"]);
        Genero::create(["nombre"=>"Thriller"]);
        Genero::create(["nombre"=>"Occidental"]);
    }
}

