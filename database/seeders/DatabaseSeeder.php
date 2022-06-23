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

        $coupon = new Coupon();
        $coupon->code = "ABC123";
        $coupon->name = "Coupon ABC123";
        $coupon->value = "10";
        $coupon->quantity = "10";
        $coupon->is_unlimited = true;
        $coupon->expiration_date = "2022-06-10";
        $coupon->is_in_euros = true;
        $coupon->save();

        $product = new Product();
        $product->name = "Product ABC123";
        $product->price = "10";
        $product->description = "Lorem";
        $product->pictures = "['#']";
        $product->available = true;
        $product->visible = true;
        $product->save();
        $product->categories()->attach(Category::find(1));

        $product = new Product();
        $product->name = "Product 2ABC123";
        $product->price = "10";
        $product->description = "Lorem";
        $product->pictures = "['#']";
        $product->available = true;
        $product->visible = true;
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

        $orderItem = new OrderItem();
        $orderItem->order_id = $order->id;
        $orderItem->product_id = $product->id;
        $orderItem->price = $product->price;
        $orderItem->quantity = 1;
        $orderItem->save();

        $order->price = $orderItem->price;
        $order->save();

        $category = new Category();
        $category->name = "Category ABC123";
        $category->save();

        $category_ = new Category();
        $category_->name = "Category EFG456";
        $category_->save();

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
