<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('shipping_first_name')->nullable();
            $table->string('shipping_last_name')->nullable();
            $table->string('shipping_street')->nullable();
            $table->string('shipping_number')->nullable();
            $table->string('shipping_box')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_zip')->nullable();
            $table->string('shipping_country')->nullable();
            $table->string('billing_first_name');
            $table->string('billing_last_name');
            $table->string('billing_street');
            $table->string('billing_number');
            $table->string('billing_box')->nullable();
            $table->string('billing_city');
            $table->string('billing_zip');
            $table->string('billing_country');
            $table->string('billing_phone');
            $table->string('billing_email');
            $table->decimal('shipping_cost', 10, 2);
            $table->enum('payment', ['stripe', 'paypal', 'cash']);
            $table->enum('shipping', ['shipping', 'collect']);
            $table->boolean('paid')->default(false);
            $table->text('notes');
            $table->string('price');
            $table->boolean('has_been_send')->default(false);
            $table->foreignId('coupon_id')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
