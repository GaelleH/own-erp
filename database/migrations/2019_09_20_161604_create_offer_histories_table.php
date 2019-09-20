<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->unsignedBigInteger('offer_id');
            $table->text('remarks');
            $table->tinyInteger('status');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();

            //foreign key constraints
            $table->foreign('offer_id')
                ->references('id')->on('offers');
            $table->foreign('user_id')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_histories');
    }
}
