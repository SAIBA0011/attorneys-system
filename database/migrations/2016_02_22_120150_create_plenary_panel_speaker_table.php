<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlenaryPanelSpeakerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plenary_panel_speaker', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plenary_panel_id')->unsigned();
            $table->integer('speaker_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('plenary_panel_id')->references('id')->on('plenary_panels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('plenary_panel_speaker');
    }
}
