<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function showAddressForm()
    {
        return view("pages.checkout.address-form");
    }
    public function getAddressForm(Request $request)
    {
        session()->put('order_informations', $request->all());
        return view('pages.checkout.payment-method-form');
    }
}
