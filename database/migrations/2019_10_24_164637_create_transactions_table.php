<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');

            $table->string('transactionid')->nullable();
            $table->string('approvedbysender')->default(0);
            $table->string('approvedbyreceiver')->default(0);
            $table->boolean('cancelled')->default(0);
        

            $table->string('supplierbin')->nullable();
            $table->string('suppliername')->nullable();
            $table->string('suppliercontact')->nullable();
            $table->string('supplieraddress')->nullable();
            $table->string('supplieremail')->nullable();

            $table->string('customerbin')->nullable();
            $table->string('customername')->nullable();
            $table->string('customercontact')->nullable();
            $table->string('customeraddress')->nullable();
            $table->string('customeremail')->nullable();

            $table->string('productidno')->nullable();
            $table->string('productname')->nullable();
            $table->string('productbrandname')->nullable();
            $table->string('productvariety')->nullable();
            $table->string('productbatchno')->nullable();
            $table->string('productquantity')->nullable();
            $table->string('productwherepurchased')->nullable();
            $table->string('productswheredelivered')->nullable();
            $table->string('productextrainfo')->nullable();

            $table->string('supplierofproductinput')->nullable();
            $table->string('batchnoofsupplierproduct')->nullable();

            $table->string('transportername')->nullable();
            $table->string('transportercontact')->nullable();

            $table->string('receiptno')->nullable();
            $table->string('dateoftransaction')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
