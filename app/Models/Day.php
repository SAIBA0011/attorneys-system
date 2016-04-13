<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Day extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $table = 'days';
    protected $fillable = ['title', 'date', 'slug'];
    protected $sluggable = ['build_from' => 'title', 'save_to' => 'slug',];

    public function panels()
    {
        return $this->hasMany(PlenaryPanel::class)->orderBy('time');
    }

    public function streams()
    {
        return $this->hasMany(Stream::class);
    }
}
