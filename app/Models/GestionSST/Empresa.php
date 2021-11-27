<?php

namespace App\Models\GestionSST;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = "empresa";

    protected $fillable = [
        'nombre_empresa',
        'nit',
        'georreferenciacion',
        'actividad_economica',
        'nivel_riesgo',
        'cantidad_trabajadores',
        'naturaleza_juridica',
        'telefono1',
        'telefono2',
        'telefono3',
        'correo_electronico',
        'tipo_empresa'
    ];

    public function riesgo() {
        return $this->belongsTo('App\Models\GestionSST\Riesgo');
    }


}
