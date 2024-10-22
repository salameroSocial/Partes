<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->default(null);
            // No incluir la columna de descripción
            // $table->string('descripcion');
        });

        // Insertar datos iniciales
        $clientes = [
            ['nombre' => 'ADISSEO'],
            ['nombre' => 'AGROPECUARIA MAREL'],
            ['nombre' => 'AVIENT'],
            ['nombre' => 'AYUNTAMIENTO DE BARBASTRO -> CONSERJERÍA CENTRO DE CONGRESOS'],
            ['nombre' => 'AYUNTAMIENTO DE BARBASTRO -> EXPOSICIONES'],
            ['nombre' => 'AYUNTAMIENTO DE BARBASTRO -> PEGADO DE CARTELES'],
            ['nombre' => 'AYUNTAMIENTO DE BARBASTRO -> PATRONATO MUNICIPAL DE DEPORTES'],
            ['nombre' => 'AYUNTAMIENTO DE BERBEGAL'],
            ['nombre' => 'AYUNTAMIENTO DE ILCHE'],
            ['nombre' => 'AYUNTAMIENTO DE LALUENGA'],
            ['nombre' => 'AYUNTAMIENTO DE PERALTA DE ALCOFEA'],
            ['nombre' => 'AYUNTAMIENTO DE SALAS ALTAS'],
            ['nombre' => 'AYUNTAMIENTO DE SALAS BAJAS'],
            ['nombre' => 'BRILEN'],
            ['nombre' => 'CALZADOS LAZARO'],
            ['nombre' => 'CAPSELOS'],
            ['nombre' => 'COMUNIDAD DE PROPIETARIOS EL ROLLADO'],
            ['nombre' => 'COMUNIDAD DE PROPIETARIOS SAN JUAN DE LA PEÑA'],
            ['nombre' => 'CONSORCIO UNIVERSITARIO UNED -> CONSERJERíA'],
            ['nombre' => 'CONSORCIO UNIVERSITARIO UNED -> REFUERZO LIBRERÍA'],
            ['nombre' => 'FUNDACIÓN AGUSTIN SERRATE'],
            ['nombre' => 'HOSPITAL DE BARBASTRO'],
            ['nombre' => 'JULIAN MAIRAL'],
            ['nombre' => 'MUSEO DIOCESANO'],
            ['nombre' => 'NESUCAR'],
            ['nombre' => 'ÓPTIMA INFORMATION TECHNOLOGIES S.L.'],
            ['nombre' => 'PIRENAICA DEL JAMON'],
            ['nombre' => 'RICARDO PEIRON'],
            ['nombre' => 'VIÑAS DEL VERO'],
            ['nombre' => 'WESTLAKE'],
        ];

        foreach ($clientes as $cliente) {
            \App\Models\Cliente::create($cliente);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
