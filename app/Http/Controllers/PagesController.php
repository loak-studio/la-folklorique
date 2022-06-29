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
        return view('pages.markdown', ['content' => $content->value, 'title' => 'Conditions générales de ventes']);
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
        //TO DO: envoyer un mail via Sendinblue
        return view('pages.contact', ['sent' => true]);
    }
    public function paymentAccepted($id)
    {
        $order = Order::find($id);
        $order->paid = true;
        $order->save();
        session()->forget('cart_uuid');
        return view('pages.payment-accepted');
    }

    public function waitingForTransfer($id)
    {
        $order = Order::find($id);
        session()->forget('cart_uuid');
        return view('pages.payment-accepted', ["transfer" => true, "order" => $order]);
    }

    public function event()
    {
        return view('pages.event');
    }
}
