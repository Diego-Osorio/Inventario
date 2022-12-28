<?php

namespace App\Exports;

use App\Models\detalle_ingreso;
use App\Models\ingreso;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;
class productosExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view ('exportProducto',[
            'productos' =>Producto::all()
        ]);
        
    }
	
}
