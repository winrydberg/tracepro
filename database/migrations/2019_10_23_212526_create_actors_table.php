<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actors', function (Blueprint $table) {
            $table->string('bin');
            $table->primary('bin');
            $table->string('name');
            $table->string('phoneno');
            $table->string('email');
            $table->string('digital_address');
            $table->text('registeredby');
            $table->string('password');
            $table->boolean('ispassword_reset');
            $table->string('resettoken');
            $table->string('actortype');
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
        Schema::dropIfExists('actors');
    }
}
