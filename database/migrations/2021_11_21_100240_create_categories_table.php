<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
            $table->string('meta_title')->nullable();
            $table->timestamps();
        });

        // Schema::table('categories', function(Blueprint $table) {
        //     $table->bigInteger('parent_id')->unsigned()->nullable();
        //     $table->foreign('parent_id')->references('id')->on('categories')
        //                 ->onUpdate('cascade')
        //                 ->onDelete('set null');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
