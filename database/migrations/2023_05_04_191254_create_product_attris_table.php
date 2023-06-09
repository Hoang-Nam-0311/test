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
        Schema::create('product_attris', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_product');
            $table->integer('id_attr');
            $table->foreign('id_product')->references('id')->on('products');
            $table->foreign('id_attr')->references('id')->on('attributes');
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
        Schema::dropIfExists('product_attris');
    }
};
