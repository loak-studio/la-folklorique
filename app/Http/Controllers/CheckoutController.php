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
        // dd($request->all());
        if ($request->different_address) {
            $request->validate([
                'shipping_address_first_name' => 'required',
                'shipping_address_last_name' => 'required',
                'shipping_address_street' => 'required',
                'shipping_address_city' => 'required',
                'shipping_address_zip' => 'required',
                'shipping_address_country' => 'required',
                'shipping_address_number' => 'required',
            ]);
        }
        $request->validate([
            'billing_address_first_name' => 'required',
            'billing_address_last_name' => 'required',
            'billing_address_street' => 'required',
            'billing_address_city' => 'required',
            'billing_address_zip' => 'required',
            'billing_address_country' => 'required',
            'billing_address_phone' => 'required',
            'billing_address_email' => 'required|email',
            'billing_address_number' => 'required',
        ]);
        if (!$request->different_address) {
            session()->put('shipping_address_first_name', $request->billing_address_first_name);
            session()->put('shipping_address_last_name', $request->billing_address_last_name);
            session()->put('shipping_address_street', $request->billing_address_street);
            session()->put('shipping_address_city', $request->billing_address_city);
            session()->put('shipping_address_zip', $request->billing_address_zip);
            session()->put('shipping_address_country', $request->billing_address_country);
            session()->put('shipping_address_number', $request->billing_address_number);
        }
        foreach ($request->all() as $key => $value) {
            session()->put($key, $value);
        }
        return to_route('checkout-payment-method-form');
    }

    public function showPaymentMethodForm()
    {
        return view('pages.checkout.payment-method-form');
    }

    public function getPaymentMethod(Request $request)
    {
        session()->put('payment_method', $request->payment_method);
        return to_route('checkout-summary');
    }

    public function showSummary()
    {
        return view('pages.checkout.summary');
    }
}
