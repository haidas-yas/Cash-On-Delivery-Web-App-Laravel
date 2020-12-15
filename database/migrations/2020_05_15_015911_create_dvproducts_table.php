<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDvproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dvproducts', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->integer('deliverer_id')->unsigned()->references('id')->on('users')->onDelete('cascade');

            $table->integer('product_id')->unsigned()->references('id')->on('products')->onDelete('cascade');

//            $table->unsignedBigInteger('product_id');
//            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->double('quantity');

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
        Schema::dropIfExists('delivererproducts');
    }
}
