<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('partes', function (Blueprint $table) {
            $table->string('tipo_servicio')->after('departamento');
        });
    }

    public function down()
    {
        Schema::table('partes', function (Blueprint $table) {
            $table->dropColumn('tipo_servicio');
        });
    }
};
