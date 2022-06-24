<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
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
        if ($request->shipping_place == "home" && session('shipping_address_zip') != '7500') {
            FacadesSession::flash('cant_deliver', 'ici Les livraisons sont restreintes à 50km autour de Leval-Trahegnies. Nous ne pouvons pas livrer à cette adresse. Vous pouvez toujours retirer votre commande à la brasserie.');
            return redirect()->back()->withInput();
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

    public function getSummary()
    {
        $cart = Cart::getCart();
        $order = new Order();
        $order->shipping_first_name = session('shipping_address_first_name');
        $order->shipping_last_name = session('shipping_address_last_name');
        $order->shipping_street = session('shipping_address_street');
        $order->shipping_city = session('shipping_address_city');
        $order->shipping_zip = session('shipping_address_zip');
        $order->shipping_country = session('shipping_address_country');
        $order->shipping_number = session('shipping_address_number');
        $order->billing_first_name = session('billing_address_first_name');
        $order->billing_last_name = session('billing_address_last_name');
        $order->billing_street = session('billing_address_street');
        $order->billing_city = session('billing_address_city');
        $order->billing_zip = session('billing_address_zip');
        $order->billing_country = session('billing_address_country');
        $order->billing_number = session('billing_address_number');
        $order->billing_phone = session('billing_address_phone');
        $order->billing_email = session('billing_address_email');
        $order->payment = session('payment_method');
        $order->notes = session('notes');
        $order->coupon_id = $cart->coupon ? $cart->coupon->id : null;
        if (session('shipping_place') == 'home') {
            $order->shipping_cost = 500;
            $order->shipping = "shipping";
        } else {
            $order->shipping_cost = 0;
            $order->shipping = "collect";
        }
        $order->price = $cart->getTotalWithShippingCost();
        $order->save();


        foreach ($cart->items as $cart_item) {
            $order_item = new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->product_id = $cart_item->product->id;
            $order_item->quantity = $cart_item->quantity;
            $order_item->price = $cart_item->product->price;
            $order_item->save();
        }

        switch (session('payment_method')) {
            case 'stripe':
                $link = $this->getStripeLink($order->id);
                break;
            case 'paypal':
                $link = $this->getPaypalLink($order->id);
                break;
            case 'cash':
                $link = URL::signedRoute('paiement-valide', $order->id);
                break;
            case 'transfer':
                $link = URL::signedRoute('transfer', $order->id);
                break;
        }
        return redirect($link);
    }

    private function getPaypalLink($order_id)
    {
        $total = Cart::getCart()->getTotalWithShippingCost();
        $gateway = Omnipay::create('PayPal_rest');
        $gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $gateway->setSecret(env('PAYPAL_SECRET'));
        $gateway->setTestMode(true);
        $response = $gateway->purchase(array(
            'amount' => $total,
            'currency' => 'EUR',
            'returnUrl' => URL::signedRoute('paiement-valide', $order_id),
            'cancelUrl' => route('panier')
        ))->send();
        return $response->getRedirectUrl();
    }

    private function getStripeLink($order_id)
    {
        $price =  Cart::getCart()->getTotalWithShippingCost();
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
            'success_url' => URL::signedRoute('paiement-valide', $order_id),
            'cancel_url' => route('panier'),

        ])['url'];
    }
}
