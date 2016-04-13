<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricePlanOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_plan_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('full_price');
            $table->string('early_bird');
            $table->integer('price_plan_id')->unsigned();
            $table->timestamps();

            $table->foreign('price_plan_id')->references('id')->on('price_plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('price_plan_options');
    }
}
