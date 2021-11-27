<?php

namespace App\Models\Comites;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuejaLaboral extends Model
{
    use HasFactory;

    protected $table = 'quejaslaborales';

    protected $fillable = [
        'nombre_empleado',
        'apellidos_empleado',
        'cedula_empleado',
        'area_empresa',
        'cargo_empleado',
        'telefono_empleado',
        'correo_empleado',
        'fecha_diligenciamiento',
        'queja_laboral',
        'papelera',
        'created_at',
        'updated_at',
    ];
}
