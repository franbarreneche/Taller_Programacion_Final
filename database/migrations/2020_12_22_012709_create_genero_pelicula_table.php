<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneroPeliculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genero_pelicula', function (Blueprint $table) {
            $table->id();
            $table->timestamps();            
            $table->foreignId("pelicula_id")->constrained()->onDelete('cascade');;
            $table->foreignId("genero_id")->constrained()->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genero_pelicula');
    }
}
