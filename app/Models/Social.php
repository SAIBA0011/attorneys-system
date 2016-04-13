<?php

namespace App\Modelsl;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'social';
    protected $fillable = ['icon', 'title', 'url'];
}
