<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use App\Models\Order;
use App\Models\PointOfSell;
use App\Models\Product;
use App\Models\Question;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function shop()
    {
        $products = Product::getVisiblesProducts();
        return view('pages.shop', ['products' => $products]);
    }


    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if (!empty($category)) {
            return view('pages.category', ['category' => $category, 'products' => $category->products]);
        }
        abort(404);
    }

    public function FAQ()
    {
        $questions = Question::all();
        return view('pages.faq', ['questions' => $questions]);
    }
    public function poliqueDeConfidentialite()
    {
        $content = Content::where('key', 'politique-de-confidentialite')->first();
        return view('pages.markdown', ['content' => $content->value, 'title' => 'Politique de confidentialité']);
    }
    public function cgv()
    {
        $content = Content::where('key', 'cgv')->first();
        return view('pages.markdown', ['content' => $content->value, 'title' => 'Conditions générales de ventes', 'displayDownloadButton' => true]);
    }
    public function mentionsLegales()
    {
        $content = Content::where('key', 'mentions-legales')->first();
        return view('pages.markdown', ['content' => $content->value, 'title' => 'Mentions légales']);
    }
    public function pointsOfSell()
    {
        $shops = PointOfSell::all();
        return view('pages.points-de-vente', ['shops' => $shops]);
    }

    public function getContactFrom(Request $request)
    {
        $this->sendMessageFromContactForm($request->name, $request->email, $request->message);
        return view('pages.contact', ['sent' => true]);
    }
    public function paymentAccepted($id)
    {
        $order = Order::find($id);
        $order->paid = true;
        $order->save();
        $this->sendOrderReceivedEmail($order);
        session()->forget('cart_uuid');
        return view('pages.payment-accepted');
    }

    public function waitingForTransfer($id)
    {
        $order = Order::find($id);
        $this->sendOrderReceivedEmail($order);
        session()->forget('cart_uuid');
        return view('pages.payment-accepted', ["transfer" => true, "order" => $order]);
    }

    public function event()
    {
        return view('pages.event');
    }

    public function sendOrderReceivedEmail($order)
    {
        $config = \SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', ENV('SENDINBLUE'));
        $apiInstance = new \SendinBlue\Client\Api\TransactionalEmailsApi(
            new \GuzzleHttp\Client(),
            $config
        );
        $to = ["email" => $order->billing_email];
        $products = "";
        foreach ($order->items as $item) {
            $products = $products . " " . $item->quantity . "x " . $item->product->name;
        }
        $params = [
            "BILLING_FIRST_NAME" => $order->billing_first_name,
            "ORDER_ID" => $order->id,
            "ORDER_PRODUCTS" => $products,
            "ORDER_PRICE" => $order->getTotalInEuros(),
            "PAYMENT_METHOD" => $order->getPaymentMethodName(),
            "SHIPPING_METHOD_TITLE" => $order->getShippingMethodName(),
            "SHIPPING_ADDRESS" => $order->getShippingAddress()
        ];
        $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
        $sendSmtpEmail["sender"] = new \SendinBlue\Client\Model\SendSmtpEmailSender(["name" => env("SENDINBLUE_NAME"), "email" => env("SENDINBLUE_EMAIL")]);
        $sendSmtpEmail["to"] = [new \SendinBlue\Client\Model\SendSmtpEmailTo($to)];
        $sendSmtpEmail["templateId"] = 19;
        $sendSmtpEmail["params"] = $params;
        $sendSmtpEmail["replyTo"] = new \SendinBlue\Client\Model\SendSmtpEmailReplyTo(["email" => env("SENDINBLUE_EMAIL")]);
        $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
    }

    public function sendMessageFromContactForm($name, $email, $message)
    {
        $config = \SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', ENV('SENDINBLUE'));
        $apiInstance = new \SendinBlue\Client\Api\TransactionalEmailsApi(
            new \GuzzleHttp\Client(),
            $config
        );
        $to = ["email" => env("CONTACT_FORM_TARGET")];

        $params = [
            "NAME" => $name,
            "EMAIL" => $email,
            "MESSAGE" => $message,
        ];
        $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
        $sendSmtpEmail["sender"] = new \SendinBlue\Client\Model\SendSmtpEmailSender(["name" => env("SENDINBLUE_NAME"), "email" => env("SENDINBLUE_EMAIL")]);
        $sendSmtpEmail["to"] = [new \SendinBlue\Client\Model\SendSmtpEmailTo($to)];
        $sendSmtpEmail["templateId"] = 23;
        $sendSmtpEmail["params"] = $params;
        $sendSmtpEmail["replyTo"] = new \SendinBlue\Client\Model\SendSmtpEmailReplyTo(["email" => env("SENDINBLUE_EMAIL")]);
        $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
    }
}
