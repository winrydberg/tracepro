<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customerof')->nullable();
            $table->string('customeroftype')->nullable();
            $table->string('customerbin')->nullable();
            $table->string('customername')->nullable();
            $table->string('customercontact')->nullable();
            $table->string('customeraddress')->nullable();
            $table->string('customeremail')->nullable();
            $table->string('customertype')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
