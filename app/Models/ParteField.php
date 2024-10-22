<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParteField extends Model
{
    use HasFactory;

    protected $fillable = ['parte_id', 'field_name', 'field_value'];

    public function parte()
    {
        return $this->belongsTo(Parte::class);
    }
}
