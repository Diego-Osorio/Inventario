<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bodegas extends Model
{
    protected $table = 'bodegas';
    protected $fillable = ['nombre', 'direccion', 'estado'];

    // Relación con productos
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
