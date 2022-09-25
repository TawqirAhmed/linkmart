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
            $table->bigInteger('user_id')->unsigned();
            $table->text('products');
            $table->strinf('order_number');
            $table->decimal('subtotal');
            $table->decimal('discount')->default(0);
            $table->decimal('tax')->default(0);
            $table->decimal('total');
            $table->string('name');
            $table->string('mobile');
            $table->string('email');
            $table->string('address_line1');
            $table->string('address_line2')->nullable();
            $table->string('post_code');
            $table->string('city');
            $table->enum('status',['ordered','confirmed','onprocess','dispached','delivered','cancled'])->default('ordered');
            $table->boolean('is_shipping_different')->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
