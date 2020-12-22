<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;
    const IDIOMAS = ["en" => "Ingles","es" => "Español","ru" => "Ruso","de" => "Aleman","ko" => "Coreano","ja" => "Japones", "it" => "Italiano", "fr" => "Frances", "ar" => "Arábico", "pt" => "Portugués", "zh" => "Chino", "da" => "Danés"];

    public function user() {
        return $this->belongsTo("App\Models\User");
    }

    public function generos() {
        return $this->belongsToMany("App\Models\Genero");
    }

    public function director() {
        return $this->belongsTo("App\Models\Artista");
    }

    public function actores() {
        return $this->belongsToMany("App\Models\Artista");
    }
}
