<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'categoria_id', 'marcas_id', 'codigo', 'stock', 'ubicacion', 'ordencompra_id', 'bodega_id', 'estado'
    ];

    public $timestamps = false;

    public function bodega()
    {
        return $this->belongsTo(bodegas::class);
    }
}
