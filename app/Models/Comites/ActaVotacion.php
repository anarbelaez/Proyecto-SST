<?php

namespace App\Models\Comites;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActaVotacion extends Model
{
    use HasFactory;

    protected $table = 'actasvotacion';

    protected $fillable = [
        'comite_id',
        'fecha_votacion',
        'lugar_votacion',
        'objetivo_votacion',
        'votos',
        'votos_blanco',
        'descripcion_votacion',
        'acta_votacion',
        'created_at',
        'updated_at',
    ];
}
