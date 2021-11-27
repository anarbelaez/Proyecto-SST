<?php

namespace App\Models\Comites;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActaNombramiento extends Model
{
    use HasFactory;

    protected $table = 'actasnombramiento';

    protected $fillable = [
        'comite',
        'lider_nombramiento',
        'cargo_lider',
        'fecha_nombramiento',
        'titulo_nombramiento',
        'descripcion_nombramiento',
        'acta_nombramiento',
        'papelera',
        'created_at',
        'updated_at',
    ];

    public function lider(){
        return $this->belongsTo('App\Models\Comites\MiembroComite');
    }
}
