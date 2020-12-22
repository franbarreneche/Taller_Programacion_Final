<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;


    public function user() {
        return $this->belongsTo("App\Models\User");
    }

    public function generos() {
        return $this->belongsToMany("App\Models\Genero");
    }

    public function director() {
        return $this->belongsTo("App\Models\Artista");
    }
}
