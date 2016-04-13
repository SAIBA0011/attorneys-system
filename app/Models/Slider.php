<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable = ['title', 'thumbnail', 'date_location'];

    //Set default image for the slider if no sliders was uploaded by the user
    public function getThumbnailAttribute()
    {
        if (! $this->attributes['thumbnail']){
            return '/assets/frontend/images/uni.jpg';
        }
        return $this->attributes['thumbnail'];
    }
}
