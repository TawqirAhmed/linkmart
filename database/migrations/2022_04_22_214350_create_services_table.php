<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->text('qualification');
            $table->text('experience');
            $table->text('contact_info');
            $table->bigInteger('service_category_id')->unsigned();
            $table->bigInteger('advertice_category_id')->unsigned();
            $table->integer('payment_amount');
            $table->string('advertice_expire_date');
            $table->string('logo');
            $table->timestamps();

            $table->foreign('service_category_id')->references('id')->on('service_categories')->onDelete('cascade');
            $table->foreign('advertice_category_id')->references('id')->on('advertice_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
