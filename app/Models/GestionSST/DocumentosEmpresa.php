<?php

namespace App\Models\GestionSST;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentosEmpresa extends Model
{
    use HasFactory;

    protected $table = "documentos_empresa";

    protected $fillable = [
        'tipo_documento_id',
        'ruta_documento',
        'fecha_creacion',
    ];

/*     public function documento() {
        return $this->hasMany(DocumentosEmpleado::class);
    } */

}
