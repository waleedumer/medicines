<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
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
            $table->integer('total_items');
            $table->string('shipping_charges');
            $table->string('total_amount');
            $table->integer('user_id')->unsigned;
            $table->index('user_id');
            $table->string('shipping_address');
            $table->string('country');
            $table->string('state');
            $table->string('zip');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id')->unsigned;
            $table->index('product_id');
            $table->integer('quantity');
            $table->integer('order_id')->unsigned;
            $table->index('order_id');
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
