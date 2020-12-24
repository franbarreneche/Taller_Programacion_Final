<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Artista as ArtistaResource;

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
            'creador' => $this->user->name,
            'director' => new ArtistaResource($this->director),
            'actores' => ArtistaResource::collection($this->actores)
        ];
    }
}
