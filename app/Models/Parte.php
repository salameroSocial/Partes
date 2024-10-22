<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parte extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente',
        'cliente_id',
        'fecha',
        'departamento',
        'hora_llegada',
        'hora_salida',
        'horas_totales',
        'trabajos_realizados',
        'realizado_por',
        'revisado_por',
        'desplazamiento',
        'kilometraje',
        'dias',
        'maquinaria',
        'nombre_maquinaria',
        'horas_maquinaria',
        'observaciones_maquinaria',
        'estado_trabajador',
        'detalles_otros',
        'trabajador_id',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function trabajador()
    {
        return $this->belongsTo('App\Models\Trabajador', 'realizado_por', 'id');
    }

    public function fields()
    {
        return $this->hasMany(ParteField::class);
    }
}
