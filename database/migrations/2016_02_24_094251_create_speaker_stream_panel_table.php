<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeakerStreamPanelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speaker_stream_panel', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stream_panel_id')->unsigned();
            $table->integer('speaker_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('stream_panel_id')->references('id')->on('stream_panels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('speaker_stream_panel');
    }
}
