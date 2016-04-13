<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Ghanem\Rating\Contracts\Rating;
use Ghanem\Rating\Traits\Ratingable as RatingTrait;
class Speaker extends Model implements SluggableInterface
{
    use RatingTrait;
    use SluggableTrait;
    protected $table = 'speakers';
    protected $fillable = ['full_name','slug','organisation','job_title','bio','thumbnail','contact_number', 'website', 'email', 'rating'];
    protected $sluggable = ['build_from' => 'full_name', 'save_to' => 'slug',];

 function panel()
    {
        return $this->belongsToMany(PlenaryPanel::class)->withTimestamps();
    }

    public function streamPanel()
    {
       return $this->belongsToMany(StreamPanel::class)->withTimestamps();
    }

    public function scopeSpeakerImage()
    {
        return $this->thumbnail ? : '/assets/frontend/placeholder/speaker-placeholder.png';
    }
}
