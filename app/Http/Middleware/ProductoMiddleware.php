<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProductoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
   /**
    * Si el usuario es un administrador, déjelo pasar; de lo contrario, rediríjalo a la página de
    * inicio.
    * 
    * @param Request request La solicitud entrante.
    * @param Closure next El siguiente middleware que se ejecutará.
    * 
    * @return La solicitud se pasa al siguiente middleware de la pila.
    */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role == 'usuario')
        return $next($request);

        return redirect('/');
    }
}
