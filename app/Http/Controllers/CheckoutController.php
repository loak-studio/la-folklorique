<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Omnipay\Omnipay;

class CheckoutController extends Controller
{
    public function showAddressForm()
    {
        return view("pages.checkout.address-form");
    }
    public function getAddressForm(Request $request)
    {
        if ($request->shipping_place == "home") {
            if ($request->different_address && $request->shipping_address_zip != '7500') {
                FacadesSession::flash('cant_deliver', 'Les livraisons sont restreintes à 50km autour de Leval-Trahegnies. Nous ne pouvons pas livrer à cette adresse. Vous pouvez toujours retirer votre commande à la brasserie.');
                return redirect()->back()->withInput();
            } else {
                if ($request->billing_address_zip != "7500") {
                    FacadesSession::flash('cant_deliver', 'Les livraisons sont restreintes à 50km autour de Leval-Trahegnies. Nous ne pouvons pas livrer à cette adresse. Vous pouvez toujours retirer votre commande à la brasserie.');
                    return redirect()->back()->withInput();
                }
            }
        }



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
        $link = $this->getStripeLink();
        return view('pages.checkout.summary', ['checkout_link' => $link]);
    }

    private function getPaypalLink()
    {
        $total = Cart::getCart()->getTotal();
        $gateway = Omnipay::create('PayPal_rest');
        $gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $gateway->setSecret(env('PAYPAL_SECRET'));
        $gateway->setTestMode(true);
        $response = $gateway->purchase(array(
            'amount' => $total,
            'currency' => 'USD',
            'returnUrl' => URL::signedRoute('paiement-valide', "1"),
            'cancelUrl' => route('panier')
        ))->send();
        return $response->getRedirectUrl();
    }

    private function getStripeLink()
    {
        $price =  Cart::getCart()->getProductsSum();
        $cart = [[
            'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                    'name' => "Commande La Folklorique",
                ],
                'unit_amount' => $price,
            ],
            'quantity' => "1"
        ]];

        \Stripe\Stripe::setApiKey(env('STRIPE_KEY'));
        return  \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card', 'bancontact'],
            'line_items' => $cart,
            'mode' => 'payment',
            'success_url' => URL::signedRoute('paiement-valide', 1),
            'cancel_url' => route('panier'),

        ])['url'];
    }
}
