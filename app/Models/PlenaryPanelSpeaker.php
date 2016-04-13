<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlenaryPanelSpeaker extends Model
{
    protected $table = 'plenary_panel_speaker';
    protected $fillable = ['plenary_panel_id', 'speaker_id'];
}
