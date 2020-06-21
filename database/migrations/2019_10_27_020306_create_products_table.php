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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('keyword');
            $table->string('description');
            $table->string('content');
            $table->string('image');
            $table->string('sku');//Mã hàng
            $table->string('price_cost');//gia giam
            $table->string('price');
            $table->string('stock');//so luong
            $table->tinyInteger('status')->default('0');
            $table->bigInteger('type_product_id')->unsigned();
            $table->foreign('type_product_id')->references('id')->on('type_products')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
