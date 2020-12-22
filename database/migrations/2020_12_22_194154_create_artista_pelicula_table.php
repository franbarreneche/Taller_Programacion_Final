<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistaPeliculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artista_pelicula', function (Blueprint $table) {
            $table->id();
            $table->timestamps();            
            $table->foreignId("pelicula_id")->constrained()->onDelete('cascade');;
            $table->foreignId("artista_id")->constrained()->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artista_pelicula');
    }
}
