<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('box');
            $table->string('city', 255);
            $table->string('company_name', 100);
            $table->string('first_name', 100);
            $table->string('email', 255);
            $table->string('last_name', 100);
            $table->string('mobile', 20);
            $table->integer('number');
            $table->string('phone', 20);
            $table->integer('postal_code');
            $table->string('street', 200);
            $table->tinyInteger('type');
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
        Schema::dropIfExists('clients');
    }
}
