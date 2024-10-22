<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParteFieldsTable extends Migration
{
    public function up()
    {
        Schema::create('parte_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parte_id');
            $table->string('field_name');
            $table->text('field_value')->nullable();
            $table->timestamps();

            $table->foreign('parte_id')->references('id')->on('partes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('parte_fields');
    }
}
