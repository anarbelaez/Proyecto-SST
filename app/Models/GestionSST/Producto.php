<?php

namespace App\Models\GestionSST;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre_producto',
        'created_at',
        'updated_at',
    ];
}
