<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{

    use HasFactory;
    protected $fillable = ['nombre'];

    public function partes()
    {
        return $this->hasMany(Parte::class);
    }
}
