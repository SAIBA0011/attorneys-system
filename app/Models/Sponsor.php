<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Sponsor extends Model implements SluggableInterface
{
    use SluggableTrait;
    protected $table = 'sponsors';
    protected $fillable = ['title', 'description', 'thumbnail', 'category_id', 'slug', 'contact_number', 'website', 'email'];
    protected $sluggable = ['build_from' => 'title', 'save_to' => 'slug'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeSponsorImage()
    {
        return $this->thumbnail ?: '/assets/frontend/placeholder/sponsor.jpg';
    }
}
