<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('farmerbin')->nullable();
            $table->string('farmbin')->nullable();
            $table->string('farmname')->nullable();
            $table->string('plotsapplied')->nullable();
            $table->string('dateofapplication')->nullable();
            $table->string('productidno')->nullable();
            $table->string('productname')->nullable();
            $table->string('supplierbin')->nullable();
            $table->string('productbrandname')->nullable();
            $table->string('productvariety')->nullable();
            $table->string('productbatchno')->nullable();
            $table->string('productquantityapplied')->nullable();
            $table->string('extrainfo')->nullable();
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
        Schema::dropIfExists('farm_records');
    }
}
