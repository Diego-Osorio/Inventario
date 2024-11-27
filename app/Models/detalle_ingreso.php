<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_ingreso extends Model
{
    use HasFactory;


    public $table ='detalle_ingreso';

    public $timestamps = false;
    /**
     */
    public function __construct() {
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
