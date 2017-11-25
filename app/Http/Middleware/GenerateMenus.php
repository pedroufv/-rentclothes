<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Menu::make('nav', function ($menu) {
            $menu->add('Início', 'home');
            $menu->add('Produtos', 'products');
            $menu->add('Cientes', 'clients');
            $menu->add('Aluguéis', 'rents');
        });

        return $next($request);
    }
}
