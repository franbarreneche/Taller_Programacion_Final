<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    use HasFactory;

    public function peliculasActuadas() {
        return $this->belongsToMany("App\Models\Pelicula");
    }

    public function peliculasDirigidas() {
        return $this->hasMany("App\Models\Pelicula","director_id");
    }
}
