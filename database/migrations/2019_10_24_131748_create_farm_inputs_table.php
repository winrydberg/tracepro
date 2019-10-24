<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_inputs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('farmerbin')->nullable();
            $table->string('supplierbin')->nullable();
            $table->string('suppliername')->nullable();
            $table->string('suppliercontact')->nullable();
            $table->string('supplieraddress')->nullable();
            $table->string('productidno')->nullable();
            $table->string('productname')->nullable();
            $table->string('productbrandname')->nullable();
            $table->string('productvariety')->nullable();
            $table->string('productbatchno')->nullable();
            $table->string('productquantity')->nullable();
            $table->string('productwherepurchased')->nullable();
            $table->string('productwheredelivered')->nullable();
            $table->string('productextrainfo')->nullable();
            $table->string('transportername')->nullable();
            $table->string('transportercontact')->nullable();
            $table->string('receiptno')->nullable();
            $table->string('receivedperson')->nullable();
            $table->string('dispatchedperson')->nullable();
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
        Schema::dropIfExists('farm_inputs');
    }
}
