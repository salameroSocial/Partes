<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nombre'];

    public $timestamps = false;
    public function partes()
    {
        return $this->hasMany(Parte::class);
    }
}
