<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned;
            $table->index('user_id');
            $table->integer('product_id')->unsigned;
            $table->index('product_id');
            $table->decimal('amount');
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
        Schema::dropIfExists('special_discounts');
    }
}
