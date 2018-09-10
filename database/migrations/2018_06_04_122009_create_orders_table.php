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
            $table->increments('id');
            $table->integer('user_id')->index()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('payment_method');
            $table->integer('country_id')->index();
            $table->integer('product_id')->nullable();
            $table->string('city');
            $table->string('postal_code');
            $table->string('address');
            $table->string('delivery_address')->nullable();
            $table->decimal('total');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
