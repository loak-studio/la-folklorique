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
        $category->name = "Category ABC123";
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
        $product->name = "Product ABC123";
        $product->price = 1000;
        $product->description = "Lorem";
        $product->pictures = ['#'];
        $product->available = true;
        $product->save();
        $product->categories()->attach(Category::find(1));

        $product = new Product();
        $product->name = "Product 2ABC123";
        $product->price = 1000;
        $product->description = "Lorem";
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
        $order->notes = "none";
        $order->payment = 'stripe';
        $order->price = 0;
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
        $order2->notes = "none";
        $order2->payment = 'stripe';
        $order2->price = 0;
        $order2->setCreatedAt(now()->subMonths(1));
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
        $order3->price = 0;
        $order3->setCreatedAt(now()->subMonths(1));
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
        $order4->shipping = "shipping";
        $order4->shipping_cost = "10";
        $order4->notes = "none";
        $order4->payment = 'stripe';
        $order4->price = 0;
        $order4->setCreatedAt(now()->subMonths(3));
        $order4->save();

        $orderItem = new OrderItem();
        $orderItem->order_id = $order->id;
        $orderItem->product_id = $product->id;
        $orderItem->price = $product->price;
        $orderItem->quantity = 1;
        $orderItem->save();

        $order->price = $orderItem->price;
        $order->save();

        $cgv = new Content();
        $cgv->key = "cgv";
        $cgv->value = "dsq";
        $cgv->save();

        $ml = new Content();
        $ml->key = "mentions-legales";
        $ml->value = "dsq";
        $ml->save();

        $pdc = new Content();
        $pdc->key = "politique-de-confidentialite";
        $pdc->value = "dsq";
        $pdc->save();

        $question = new Question();
        $question->question = "La folklorique ça se boit?";
        $question->answer = "Oui";
        $question->save();

        $pos = new PointOfSell();
        $pos->name = "Tristan Croket";
        $pos->street = "24 rue du progrès";
        $pos->city = "Froyennes";
        $pos->save();
    }
}
