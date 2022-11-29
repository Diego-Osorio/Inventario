<?php

namespace App\Exports;

use App\Models\detalle_ingreso;
use App\Models\ingreso;
use App\Models\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;

class productosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Producto::all();
    }
}
