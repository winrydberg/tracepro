<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *'productidno' ,
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('productidno')->nullable();
            $table->string('productname')->nullable();
            $table->string('productbrandname')->nullable();
            $table->string('productvariety')->nullable();
            $table->string('productbatchno')->nullable();
            $table->integer('productquantity')->nullable();
            $table->integer('farmid')->nullable();
            $table->string('actorbin')->nullable();
            $table->string('inputbatchno')->nullable();
            $table->integer('plotid')->nullable();
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
