<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parte>
 */
class ParteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cliente' => $this->faker->name,
            'fecha' => $this->faker->date(),
            'departamento' => $this->faker->word,
            'hora_llegada' => $this->faker->time(),
            'hora_salida' => $this->faker->time(),
            'horas_totales' => $this->faker->numberBetween(1, 10),
            'trabajos_realizados' => $this->faker->text,
            'realizado_por' => $this->faker->name,
            'revisado_por' => $this->faker->name,
            'desplazamiento' => $this->faker->boolean,
            'kilometraje' => $this->faker->numberBetween(100, 1000),
            'dias' => $this->faker->numberBetween(1, 7),
            'maquinaria' => $this->faker->boolean,
            'nombre_maquinaria' => $this->faker->word,
            'horas_maquinaria' => $this->faker->numberBetween(1, 24),
            'observaciones_maquinaria' => $this->faker->text,
            'estado_trabajador' => $this->faker->word,
            'detalles_otros' => $this->faker->text,
        ];
    }
}
