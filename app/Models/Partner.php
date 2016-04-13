<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Partner extends Model implements SluggableInterface
{
    use SluggableTrait;
    protected $table = 'partners';
    protected $fillable = ['title', 'slug', 'email', 'website', 'thumbnail', 'description', 'contact_number'];
    protected $sluggable = ['build_from' => 'title', 'save_to' => 'slug',];

    public function scopePartnerImage()
    {
        return $this->thumbnail ?: '/assets/frontend/placeholder/partner.jpg';
    }
}