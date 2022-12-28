<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
   'id',
   'nombre',
   'marca_id',
   'categoria_id',
   'codigo',
   'stock',
   'ubicacion',
    ];
    public $timestamps = false;
    
}