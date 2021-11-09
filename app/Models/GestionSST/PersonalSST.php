<?php

namespace App\Models\GestionSST;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalSST extends Model
{
    use HasFactory;

    protected $table = "personalsst";

    protected $fillable = [
        'documento_identidad',
        'nombre_empleado',
        'apellidos_empleado',
        'nivelestudio_id',
        'estado',
        'fecha_creacion',
    ];

    public function nivelestudio() {
        return $this->belongsTo('App\Models\GestionSST\NivelesEstudio');
    }
/*     public function documentos() {
        return $this->belongsToMany(TiposDocumentos::class);
    }
*/
}
