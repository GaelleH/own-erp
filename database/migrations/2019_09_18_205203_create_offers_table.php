<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->date('date');
            $table->string('number', 10);
            $table->integer('number_value');
            $table->text('remarks');
            $table->tinyInteger('status');
            $table->decimal('total_price', 8, 2);
            $table->timestamps();
            $table->softDeletes();

            //foreign key constraints
            $table->foreign('client_id')
                ->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
