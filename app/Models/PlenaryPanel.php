<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlenaryPanel extends Model
{
    protected $table = 'plenary_panels';
    protected $fillable = ['title', 'description', 'day_id', 'speakers', 'time'];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function speaker()
    {
       return $this->belongsToMany(Speaker::class)->withTimestamps();
    }

    public function getSpeakerPluckAttribute()
    {
        $speakers = $this->speaker->pluck('id');
        return $speakers->toArray();
    }

}
