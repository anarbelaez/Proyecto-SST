<?php

namespace App\Models\GestionSST;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentosEmpresa extends Model
{
    use HasFactory;

    protected $table = "documentos_empresa";

    protected $fillable = [
        'tipodocumento_id',
        'titulo',
        'descripcion',
        'documento',
        'created_at',
    ];

    public function tipodocumento() {
        return $this->belongsTo('App\Models\GestionSST\TipoDocumento');
    }

}
