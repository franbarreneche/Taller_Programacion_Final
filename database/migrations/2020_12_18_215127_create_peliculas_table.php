<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("titulo")->nullable();
            $table->date("fecha_estreno")->nullable();
            $table->decimal("rating")->nullable();
            $table->boolean("todo_publico")->nullable();//si es para todo publico o no
            $table->string("idioma")->nullable();
            $table->text("resumen")->nullable();
            $table->string("imagen")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
}
