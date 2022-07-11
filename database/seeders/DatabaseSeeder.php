<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Content;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PointOfSell;
use App\Models\Product;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->email = "admin@loak.studio";
        $user->name = "Admin";
        $user->password = Hash::make('secret');
        $user->save();

        $category = new Category();
        $category->name = "Bière";
        $category->save();

        $category_ = new Category();
        $category_->name = "Category EFG456";
        $category_->save();

        $coupon = new Coupon();
        $coupon->code = "ABC123";
        $coupon->value = 100;
        $coupon->quantity = "10";
        $coupon->save();

        $product = new Product();
        $product->visible = true;
        $product->name = "Pack 6 bouteilles (33cl)";
        $product->price = 1500;
        $product->description = "Un pack en carton de 6 bouteilles. Idéal pour découvrir ou faire découvrir La Folklorique à tous les amateurs de bières artisanales et de nos carnavals.";
        $product->pictures = ['#'];
        $product->available = true;
        $product->save();
        $product->categories()->attach(Category::find(1));

        $product = new Product();
        $product->visible = true;
        $product->name = "Bac 24 bouteilles ( 33cl )";
        $product->price = 5000;
        $product->description = "Un bac en carton de 24 bouteilles. Pour tous les amateurs de bières artisanales et de nos carnavals, ce bac vous permettra de partager La Folklorique avec un maximum de personnes.";
        $product->pictures = ['#'];
        $product->available = true;
        $product->save();
        $product->categories()->attach(Category::find(1));

        $order = new Order();
        $order->shipping_first_name = "John";
        $order->shipping_last_name = "Doe";
        $order->shipping_street = "Street";
        $order->shipping_number = "1";
        $order->shipping_box = "A";
        $order->shipping_city = "City";
        $order->shipping_zip = "12345";
        $order->shipping_country = "Country";
        $order->billing_first_name = "John";
        $order->billing_last_name = "Doe";
        $order->billing_street = "Street";
        $order->billing_number = "1";
        $order->billing_box = "A";
        $order->billing_city = "City";
        $order->billing_zip = "12345";
        $order->billing_country = "Country";
        $order->billing_phone = "123456789";
        $order->billing_email = "john@doe.com";
        $order->shipping = "shipping";
        $order->shipping_cost = "10";
        $order->notes = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quo consectetur vel minus incidunt, pariatur quibusdam maxime. Eum sapiente nisi praesentium similique odit, est repellat? Dicta voluptatibus deserunt consectetur ab.";
        $order->payment = 'cash';
        $order->price = 15000;
        $order->paid = true;
        $order->coupon_id = 1;
        $order->save();

        $order2 = new Order();
        $order2->shipping_first_name = "John";
        $order2->shipping_last_name = "Doe";
        $order2->shipping_street = "Street";
        $order2->shipping_number = "1";
        $order2->shipping_box = "A";
        $order2->shipping_city = "City";
        $order2->shipping_zip = "12345";
        $order2->shipping_country = "Country";
        $order2->billing_first_name = "John";
        $order2->billing_last_name = "Doe";
        $order2->billing_street = "Street";
        $order2->billing_number = "1";
        $order2->billing_box = "A";
        $order2->billing_city = "City";
        $order2->billing_zip = "12345";
        $order2->billing_country = "Country";
        $order2->billing_phone = "123456789";
        $order2->billing_email = "john@doe.com";
        $order2->shipping = "shipping";
        $order2->shipping_cost = "10";
        $order2->payment = 'transfer';
        $order2->price = 10000;
        $order2->paid = false;
        $order2->coupon_id = 1;
        $order2->status = 'processing';
        $order2->save();

        $order3 = new Order();
        $order3->shipping_first_name = "John";
        $order3->shipping_last_name = "Doe";
        $order3->shipping_street = "Street";
        $order3->shipping_number = "1";
        $order3->shipping_box = "A";
        $order3->shipping_city = "City";
        $order3->shipping_zip = "12345";
        $order3->shipping_country = "Country";
        $order3->billing_first_name = "John";
        $order3->billing_last_name = "Doe";
        $order3->billing_street = "Street";
        $order3->billing_number = "1";
        $order3->billing_box = "A";
        $order3->billing_city = "City";
        $order3->billing_zip = "12345";
        $order3->billing_country = "Country";
        $order3->billing_phone = "123456789";
        $order3->billing_email = "john@doe.com";
        $order3->shipping = "shipping";
        $order3->shipping_cost = "10";
        $order3->notes = "none";
        $order3->payment = 'stripe';
        $order3->price = 5000;
        $order3->paid = true;
        $order3->coupon_id = 1;
        $order3->status = 'cancelled';
        $order3->save();

        $order4 = new Order();
        $order4->shipping_first_name = "John";
        $order4->shipping_last_name = "Doe";
        $order4->shipping_street = "Street";
        $order4->shipping_number = "1";
        $order4->shipping_box = "A";
        $order4->shipping_city = "City";
        $order4->shipping_zip = "12345";
        $order4->shipping_country = "Country";
        $order4->billing_first_name = "John";
        $order4->billing_last_name = "Doe";
        $order4->billing_street = "Street";
        $order4->billing_number = "1";
        $order4->billing_box = "A";
        $order4->billing_city = "City";
        $order4->billing_zip = "12345";
        $order4->billing_country = "Country";
        $order4->billing_phone = "123456789";
        $order4->billing_email = "john@doe.com";
        $order4->shipping = "collect";
        $order4->shipping_cost = "10";
        $order4->notes = "none";
        $order4->payment = 'paypal';
        $order4->price = 5000;
        $order4->paid = true;
        $order4->coupon_id = 1;
        $order4->status = 'finished';
        $order4->save();

        $orderItem = new OrderItem();
        $orderItem->order_id = 1;
        $orderItem->product_id = 1;
        $orderItem->price = Product::find(1)->price;
        $orderItem->quantity = 15;
        $orderItem->save();

        $orderItem2 = new OrderItem();
        $orderItem2->order_id = 2;
        $orderItem2->product_id = 1;
        $orderItem2->price = Product::find(1)->price;
        $orderItem2->quantity = 10;
        $orderItem2->save();

        $orderItem3 = new OrderItem();
        $orderItem3->order_id = 3;
        $orderItem3->product_id = 1;
        $orderItem3->price = Product::find(1)->price;
        $orderItem3->quantity = 5;
        $orderItem3->save();

        $orderItem4 = new OrderItem();
        $orderItem4->order_id = 4;
        $orderItem4->product_id = 1;
        $orderItem4->price = Product::find(1)->price;
        $orderItem4->quantity = 5;
        $orderItem4->save();

        $cgv = new Content();
        $cgv->key = "cgv";
        $cgv->value = "";
        $cgv->save();

        $banner = new Content();
        $banner->key = "banner";
        $banner->value = "";
        $banner->save();

        $ml = new Content();
        $ml->key = "mentions-legales";
        $ml->value = "";
        $ml->save();

        $pdc = new Content();
        $pdc->key = "politique-de-confidentialite";
        $pdc->value = "";
        $pdc->save();

        $question = new Question();
        $question->question = "La Folklorique, qu'est-ce que c'est ?";
        $question->answer = "La Folklorique est une bière ambrée artisanale belge, parfumée à l’orange et refermentée en bouteille. Le procédé artisanal signifie que nous ne rajoutons aucun sucre supplémentaire ni de sirop. Le goût d’orange est obtenu en travaillant directement le fruit, de manière naturelle. Etant artisanale, il est possible qu’un dépôt de levure/orange soit présent dans le fond de la bouteille. Libre à vous de le servir ou non.";
        $question->save();

        $pos = new PointOfSell();
        $pos->name = "Le Petit Mousse";
        $pos->street = "Avenue Charles Deliège 15";
        $pos->city = "Binche";
        $pos->google_my_business = "https://www.google.com/maps/place/Le+Petit+Mousse/@50.4119269,4.1639282,17z/data=!3m1!4b1!4m5!3m4!1s0x47c2386a660da367:0xdec11617e8b020ac!8m2!3d50.4119384!4d4.1660757";
        $pos->save();
    }
}
