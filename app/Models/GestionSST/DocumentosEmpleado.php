<?php

namespace App\Models\GestionSST;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentosEmpleado extends Model
{
    use HasFactory;

    protected $table = "documentos_empleados";

    protected $fillable = [
        'personalsst_id',
        'tipodocumento_id',
        'ruta_archivo',
        'fecha_creacion',
    ];

/*     public function empleado() {
        return $this->belongsTo(PersonalSST::class, 'empleado_id', 'id');
    }

    public function tipodocumento() {
        return $this->belongsTo(TiposDocumentos::class,'tipo_documento_id','id');
    } */


}
