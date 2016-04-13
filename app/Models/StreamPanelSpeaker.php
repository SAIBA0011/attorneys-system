<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StreamPanelSpeaker extends Model
{
    protected $table = 'stream_panel_speaker';
    protected $fillable = ['stream_panel_id', 'speaker_id'];
}
