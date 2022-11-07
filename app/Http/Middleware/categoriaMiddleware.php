<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class categoriaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    /**
     * Si el usuario está logueado y su rol es 'usuario', déjelo pasar. De lo contrario, redirígelos a
     * la página de inicio.
     * 
     * @param Request request La solicitud entrante.
     * @param Closure next El siguiente middleware que se ejecutará.
     * 
     * @return El usuario está siendo redirigido a la página de inicio si el usuario no es
     * administrador.
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role =='usuario')
        return $next($request);

        return redirect('/');
    }
}
