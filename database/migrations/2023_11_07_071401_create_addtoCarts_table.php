<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addtoCarts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shopCart_id');
            $table->foreign('shopCart_id')->references('id')->on('shopCarts');
            $table->index('shopCart_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->index('product_id');
            $table->string('productName');
            $table->integer('quantity');
            $table->float('price');
            $table->float('totalPrice');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addto_cart');
    }
};
