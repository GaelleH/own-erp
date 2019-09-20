<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferCommunicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_communications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->text('description');
            $table->string('name', 255);
            $table->unsignedBigInteger('offer_id');
            $table->tinyInteger('type');
            $table->timestamps();
            $table->softDeletes();

            //foreign key constraints
            $table->foreign('offer_id')
                ->references('id')->on('offers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_communications');
    }
}
