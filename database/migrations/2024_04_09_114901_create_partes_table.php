<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('partes', function (Blueprint $table) {
            $table->id();
            $table->string('cliente')->nullable();
            $table->string('cliente_id')->nullable();
            $table->date('fecha')->nullable();
            $table->string('departamento')->nullable();
            $table->time('hora_llegada')->nullable();
            $table->time('hora_salida')->nullable();
            $table->integer('horas_totales')->nullable();
            $table->text('trabajos_realizados')->nullable();
            $table->string('realizado_por')->nullable();
            $table->string('revisado_por')->nullable();
            $table->boolean('desplazamiento')->default(false);
            $table->integer('kilometraje')->nullable();
            $table->integer('dias')->nullable();
            $table->boolean('maquinaria')->default(false);
            $table->string('nombre_maquinaria')->nullable();
            $table->integer('horas_maquinaria')->nullable();
            $table->text('observaciones_maquinaria')->nullable();
            $table->string('estado_trabajador')->nullable();
            $table->text('detalles_otros')->nullable();
            $table->text('trabajador_id')->nullable();
            $table->text('subido_por')->nullable();
            $table->timestamps();
        });

        // Insertar dato inicial
        \App\Models\Parte::create([
            'cliente' => 'Jhon Doe',
            'fecha' => now(),
            'departamento' => 'Informática',
            'hora_llegada' => now()->format('H:i'),
            'hora_salida' => now()->addHours(8)->format('H:i'),
            'horas_totales' => 8,
            'trabajos_realizados' => 'Administración del sistema',
            'realizado_por' => 'John Doe',
            'revisado_por' => 'Doe Jhon',
            'estado_trabajador' => 'Activo',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partes');
    }
};
