<?php

namespace App\Models\Comites;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiembroComite extends Model
{
    use HasFactory;

    protected $table = 'miembroscomites';

    protected $fillable = [
        'comite',
        'cargo',
        'nombre_miembro',
        'apellidos_miembro',
        'cedula_miembro',
        'telefono_miembro',
        'correo_miembro',
        'area_empresa',
        'created_at',
        'updated_at',
    ];

    public function cargo() {
        return $this->belongsTo('App\Models\Comites\Cargo');
    }

    public function comite() {
        return $this->belongsTo('App\Models\Comites\Comite');
    }
}
