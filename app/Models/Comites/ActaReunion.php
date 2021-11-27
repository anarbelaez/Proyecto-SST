<?php

namespace App\Models\Comites;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActaReunion extends Model
{
    use HasFactory;

    protected $table = 'actasreuniones';

    protected $fillable = [
        'comite_id',
        'fecha_reunion',
        'hora_inicio',
        'hora_final',
        'nombre_lider',
        'lugar_reunion',
        'descripcion_reunion',
        'acta_reunion',
        'papelera',
        'created_at',
        'updated_at',
    ];

    public function lider(){
        return $this->belongsTo('App\Models\Comites\MiembroComite');
    }
}
