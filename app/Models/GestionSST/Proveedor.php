<?php

namespace App\Models\GestionSST;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedors';

    protected $fillable = [
        'nombre_proveedor',
        'nit',
        'arl',
        'certificado_arl',
        'seguridad_social',
        'created_at',
        'updated_at',
    ];

    public function fichaproducto() {
        return $this->hasMany('App\Models\GestionSST\FichaProducto');
    }

}
