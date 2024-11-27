<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'codigo',
        'marcas_id',
        'categoria_id',
        'stock',
        'descripcion',
        'bodega_id',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marcas_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
