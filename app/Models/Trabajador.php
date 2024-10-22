<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $fillable = [
        "nombre",
        "apellidos",
        "rango",
        "precio_hora",
        "id_empresa",
    ];
}
