<?php

namespace App\Models\GestionSST;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaProducto extends Model
{
    use HasFactory;

    protected $table = "fichaproductos";

    protected $fillable = [
        'producto_id',
        'proveedor_id',
        'titulo',
        'descripcion',
        'created_at',
        'updated_at',
    ];

    public function proveedor(){
        return $this->belongsTo('App\Models\GestionSST\Proveedor');
    }

    public function producto(){
        return $this->belongsTo('App\Models\GestionSST\Producto');
    }
}
