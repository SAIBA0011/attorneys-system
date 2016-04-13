<?php

namespace App\Models;

use App\Models\StreamPanel;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    protected $table = 'streams';
    protected $fillable = ['title', 'day_id'];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function panels()
    {
        return $this->hasMany(StreamPanel::class)->orderBy('time');
    }
}