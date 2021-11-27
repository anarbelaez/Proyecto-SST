<?php

namespace App\Models\Comites;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostulanteBE extends Model
{
    use HasFactory;

    protected $table = 'bepostulantes';

    protected $fillable = [
        'nombre_postulante',
        'apellidos_postulante',
        'cedula_postulante',
        'telefono_postulante',
        'correo_postulante',
        'area_empresa',
        'fecha_ingreso',
        'experiencia_brigadas',
        'hdv_postulante',
        'created_at',
        'updated_at',
    ];

}
