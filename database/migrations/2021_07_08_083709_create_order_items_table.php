<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('qtn');
            $table->timestamps();
        });

        Schema::table('order_items', function (Blueprint $table) {
            // 
            $table->unsignedInteger('order_id'); 
            $table->unsignedInteger('product_id'); 
            $table->foreign('order_id')->references('id')->on('orders'); 
            $table->foreign('product_id')->references('id')->on('products'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
