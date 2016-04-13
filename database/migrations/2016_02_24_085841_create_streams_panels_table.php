<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStreamsPanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stream_panels', function (Blueprint $table) {
            $table->increments('id');
            $table->timeTz('time');
            $table->string('title');
            $table->integer('stream_id')->unsigned();
            $table->longText('description');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('stream_id')->references('id')->on('streams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stream_panels');
    }
}
