<?php
namespace App\Exports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductosExport implements FromCollection
{
    public function collection()
    {
        return Producto::all();  // O ajusta esta consulta según lo que necesites exportar
    }
}
