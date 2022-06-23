<?php

namespace App\Http\Livewire\Payment;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Omnipay\Omnipay;

class Wizard extends Component
{
    public $shippingPlace = 'home';
    public $cart;
    public $showBillingAddress = false;
    public $differentBillingAddress = false;
    public $paymentMethod = "creditCard";
    public $notes;
    public $step = 1;
    public $shipping_address = [
        'first_name' => 'b',
        'last_name' => 'b',
        'street' => 'b',
        'city' => 'b',
        'zip' => 'b',
        'country' => 'b',
        'number' => 'b',
        'box' => 'n'
    ];
    public $billing_address = [
        'first_name' => 'benjamin',
        'last_name' => 'geets',
        'street' => 'rue ',
        'city' => 'ville',
        'zip' => '7500',
        'country' => 'be',
        'email' => 'b@b.b',
        'phone' => 'd',
        'number' => '1',
        'box' => 'a'
    ];

    protected function rules()
    {

        $zipcodes = ['7500'];
        //Livraison à la brasserie
        if ($this->shippingPlace == "brewery") {
            return [
                'billing_address.first_name' => 'required',
                'billing_address.last_name' => 'required',
                'billing_address.street' => 'required',
                'billing_address.number' => 'required',
                'billing_address.city' => 'required',
                'billing_address.zip' => 'required|digits:4',
                'billing_address.country' => 'required',
                'billing_address.email' => 'required|email',
                'billing_address.phone' => 'required',
            ];
        }
        if ($this->shippingPlace == "home") {
            //Si l'adresse de livrasion est l'adresse de facturation, copie l'adresse de livraison
            if (!$this->differentBillingAddress) {
                $this->shipping_address = $this->billing_address;
                return [
                    'billing_address.first_name' => 'required',
                    'billing_address.last_name' => 'required',
                    'billing_address.street' => 'required',
                    'billing_address.number' => 'required',
                    'billing_address.city' => 'required',
                    'billing_address.zip' =>
                    [
                        'required', 'digits:4',
                        Rule::in($zipcodes)
                    ],
                    'billing_address.country' => 'required',
                    'billing_address.email' => 'required|email',
                    'billing_address.phone' => 'required',
                    'shipping_address.first_name' => 'required',
                    'shipping_address.last_name' => 'required',
                    'shipping_address.street' => 'required',
                    'shipping_address.number' => 'required',
                    'shipping_address.city' => 'required',
                    'shipping_address.zip' =>
                    [
                        'required', 'digits:4',
                        Rule::in($zipcodes)
                    ],
                    'shipping_address.country' => 'required',
                ];
            } else {
                return [
                    'billing_address.first_name' => 'required',
                    'billing_address.last_name' => 'required',
                    'billing_address.street' => 'required',
                    'billing_address.number' => 'required',
                    'billing_address.city' => 'required',
                    'billing_address.zip' => 'required|digits:4',
                    'billing_address.country' => 'required',
                    'billing_address.email' => 'required|email',
                    'billing_address.phone' => 'required',
                    'shipping_address.first_name' => 'required',
                    'shipping_address.last_name' => 'required',
                    'shipping_address.street' => 'required',
                    'shipping_address.number' => 'required',
                    'shipping_address.city' => 'required',
                    'shipping_address.zip' =>
                    [
                        'required', 'digits:4',
                        Rule::in($zipcodes)
                    ],
                    'shipping_address.country' => 'required',
                ];
            }
        }
    }

    protected $listeners = ['shippingPlaceChanged', 'updateDifferentBillingAddress', 'nextStep'];

    public function setStep($value)
    {
        $this->step = $value;
    }

    public function shippingPlaceChanged($value)
    {
        $this->shippingPlace = $value;
        $this->emit('updateShippingPlace', $value);
    }

    public function nextStep()
    {
        if ($this->step == 1) {
            $this->validate();
        }
        if ($this->step == 2) {
        }
        if ($this->step == 3) {
            $order = new Order();
            $order->billing_first_name = $this->billing_address['first_name'];
            $order->billing_last_name = $this->billing_address['last_name'];
            $order->billing_street = $this->billing_address['street'];
            $order->billing_number = $this->billing_address['number'];
            $order->billing_box = $this->billing_address['box'];
            $order->billing_city = $this->billing_address['city'];
            $order->billing_zip = $this->billing_address['zip'];
            $order->billing_country = $this->billing_address['country'];
            $order->billing_phone = $this->billing_address['phone'];
            $order->billing_email = $this->billing_address['email'];
            if ($this->shippingPlace != "brewery") {
                $order->shipping_first_name = $this->shipping_address['first_name'];
                $order->shipping_last_name = $this->shipping_address['last_name'];
                $order->shipping_street = $this->shipping_address['street'];
                $order->shipping_number = $this->shipping_address['number'];
                $order->shipping_box = $this->shipping_address['box'];
                $order->shipping_city = $this->shipping_address['city'];
                $order->shipping_zip = $this->shipping_address['zip'];
                $order->shipping_country = $this->shipping_address['country'];
                $order->shipping_phone = $this->shipping_address['phone'];
                $order->shipping_email = $this->shipping_address['email'];
            }
            $order->shipping_cost = 5;
            $order->notes = "non";
            if ($this->paymentMethod == "creditCard") {
                $order->payment = "stripe";
            }
            if ($this->paymentMethod == "paypal") {
                $order->payment = "paypal";
            }
            if ($this->shippingPlace == "brewery") {
                $order->shipping = "collect";
            }
            if ($this->shippingPlace == "home") {
                $order->shipping = "shipping";
            }

            $order->price = $this->cart->getTotal();
            $order->save();
            foreach ($this->cart->items as $cart_item) {
                $order_item = new OrderItem();
                $order_item->order_id = $order->id;
                $order_item->product_id = $cart_item->product_id;
                $order_item->quantity = $cart_item->quantity;
                $order_item->price = $cart_item->product->price;
                $order_item->save();
            }
            switch ($this->paymentMethod) {
                case 'paypal':
                    $total = $this->cart->getTotal();
                    $gateway = Omnipay::create('PayPal_rest');
                    $gateway->setClientId(env('PAYPAL_CLIENT_ID'));
                    $gateway->setSecret(env('PAYPAL_SECRET'));
                    $gateway->setTestMode(true);
                    $response = $gateway->purchase(array(
                        'amount' => $total,
                        'currency' => 'USD',
                        'returnUrl' => URL::signedRoute('paiement-valide', $order->id),
                        'cancelUrl' => route('panier')
                    ))->send();
                    return redirect()->to($response->getRedirectUrl());
                    break;
                case 'creditCard':
                    $cart = [];
                    foreach ($this->cart->items as $item) {
                        array_push($cart, [
                            'price_data' => [
                                'currency' => 'eur',
                                'product_data' => [
                                    'name' => $item->product->name,
                                ],
                                'unit_amount' => $item->product->price * 100
                            ],
                            'quantity' => $item->quantity
                        ]);
                    }

                    \Stripe\Stripe::setApiKey(env('STRIPE_KEY'));
                    $payment_link = \Stripe\Checkout\Session::create([
                        'payment_method_types' => ['card', 'bancontact'],
                        'line_items' => $cart,
                        'mode' => 'payment',
                        'success_url' => URL::signedRoute('paiement-valide', $order->id),
                        'cancel_url' => route('panier'),

                    ]);
                    return redirect()->to($payment_link['url']);
                    break;
                default:
                    return redirect()->to('https://geets.dev');
                    break;
            }
            return redirect()->route('home');
        }
        $this->step++;
    }
    public function updateDifferentBillingAddress($value)
    {
        $this->showBillingAddress = $value;
    }

    public function render()
    {
        $this->cart = Cart::getCart();
        return view('livewire.payment.wizard')->layout('layouts.main', [
            'title' => 'Paiement de votre commande',
        ]);
    }
}
