<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_paciente',
        'cedula_identidad',
        'probabilidad_covid',
        'recomendaciones',
        
    ];
}
