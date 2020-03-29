<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id');
            $table->string('productId');
            $table->string('productQnty');
            $table->string('variationName');
            $table->string('variationValue');
            $table->timestamps();
        });

        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('totalItems');
            $table->string('shippingCharges');
            $table->string('totalAmount');
            $table->string('shippingAddress');
            $table->string('country');
            $table->string('state');
            $table->string('zip');
            $table->string('status');
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
}
