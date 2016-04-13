<?php

namespace App\Models;

use App\Models\Stream;
use Illuminate\Database\Eloquent\Model;

class StreamPanel extends Model
{
    protected $table = 'stream_panels';
    protected $fillable = ['title', 'time', 'description', 'stream_id'];

    public function streams()
    {
        return $this->belongsTo(Stream::class);
    }

    public function speakers()
    {
        return $this->belongsToMany(Speaker::class);
    }

    public function getSpeakerPluckAttribute()
    {
        $speakers = $this->speakers->pluck('id');
        return $speakers->toArray();
    }
}
