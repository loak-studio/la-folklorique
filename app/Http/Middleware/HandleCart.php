<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HandleCart
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

        if ($request->session()->has('cart_uuid')) {
            View::share('cart', Cart::where('uuid', $request->session()->get('cart_uuid'))->first());
        } else {
            $cart = new Cart();
            $cart->save();
            $request->session()->put('cart_uuid', $cart->uuid);
            View::share('cart', Cart::where('uuid', $cart->uuid)->first());
        }

        return $next($request);
    }
}
