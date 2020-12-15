<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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

            $table->id();

            $table->integer('deliverer_id')->unsigned()->references('id')->on('users')->where('usertype', 'Deliverer')->onDelete("cascade");;

            $table->integer('product_id')->unsigned()->references('id')->on('products')->onDelete("cascade");;

            $table->integer('responsible_id')->unsigned()->references('id')->on('users')->where('usertype', 'admin')->onDelete("cascade");;

            $table->string('order_status')->default('new');

            $table->float('quantity');

            $table->integer('totalprice');

            $table->string('client_name');

            $table->string('client_phone');

            $table->string('client_city');

            $table->string('client_addrs');

            $table->text('note');

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
