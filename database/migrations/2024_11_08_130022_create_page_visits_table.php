<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageVisitsTable extends Migration
{
    public function up()
    {
        Schema::create('page_visits', function (Blueprint $table) {
            $table->id();
            $table->string('page_name'); // Nombre de la página
            $table->timestamp('visited_at')->useCurrent(); // Almacena el momento de la visita
        });
    }

    public function down()
    {
        Schema::dropIfExists('page_visits'); // Elimina la tabla si se deshace la migración
    }
}
