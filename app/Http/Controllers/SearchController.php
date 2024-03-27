<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Obtener el término de búsqueda desde la solicitud
        $query = $request->input('query');

        // Realizar la búsqueda en tu aplicación (por ejemplo, en una base de datos)

        // Devolver los resultados de la búsqueda a una vista
        return view('search_results', ['query' => $query]);
    }
}
