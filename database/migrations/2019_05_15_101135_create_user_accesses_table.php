<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_accesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned;
            $table->index('user_id');
            $table->integer('category_id')->unsigned;
            $table->index('category_id');
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
        Schema::dropIfExists('user_accesses');
    }
}
