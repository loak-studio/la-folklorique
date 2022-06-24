<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use Closure;
use Illuminate\Http\Request;

class EnsureCartIsBigEnough
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Cart::getCart()->getProductsSum() > 1200) {

            return $next($request);
        } else {
            abort(403);
        }
    }
}
