<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, $next) {
    if(empty(session('cart'))) {
        return redirect()->route('menu')->with('error', 'Please add items to cart first');
    }
    return $next($request);
}
}
