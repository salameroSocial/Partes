<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->default(null);
            $table->timestamps();
        });

        // Insertar datos iniciales
        $departamentos = [
            ['nombre' => 'Limpieza'],
            ['nombre' => 'Servicios externos'],
            ['nombre' => 'Brigada'],
        ];

        foreach ($departamentos as $departamento) {
            \App\Models\Departamento::create($departamento);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
}
