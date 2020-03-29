<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('products', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('name');
        //     $table->integer('product_group')->unsigned;
        //     $table->index('product_group');
        //     $table->string('purchase_price');
        //     $table->string('sale_price');
        //     $table->string('purchase_vat');
        //     $table->string('sale_vat');
        //     $table->integer('brand_id')->unsigned;
        //     $table->index('brand_id');
        //     $table->integer('category_id')->unsigned;
        //     $table->index('category_id');
        //     $table->string('image_url');
        //     $table->string('description');
        //     $table->string('product_code');
        //     $table->timestamps();
        // });

        // Schema::create('product_categories', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('name');
        //     $table->string('type');
        //     $table->timestamps();
        // });

        // Schema::create('brands', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('name');
        //     $table->timestamps();
        // });

        // Schema::create('groups', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('name');
        //     $table->string('discount_rate');
        //     $table->timestamps();
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
