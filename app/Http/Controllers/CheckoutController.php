<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function showAddressForm()
    {
        return view("pages.checkout.address-form");
    }
}
