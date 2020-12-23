<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Pelicula extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'fecha_estreno' => $this->fecha_estreno,
            'rating' => $this->rating,
            'todo_publico' => $this->todo_publico,
            'resumen' => $this->resumen,
            'poster' => $this->poster,
            'user' => $this->user->name,
            'director' => $this->director->nombre,
            'actores' => $this->actores
        ];
    }
}
