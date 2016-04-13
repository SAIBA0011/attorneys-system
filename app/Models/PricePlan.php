<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricePlan extends Model
{
    protected $table = 'price_plans';
    protected $fillable = ['title', 'early_bird_expiry', 'link'];

    public function PlanOption()
    {
        return $this->hasMany(PricePlanOption::class);
    }

    public function setExpiryDateAttribute($date)
    {
        return $this->attributes['early_bird_expiry'] = Carbon::parse($date);
    }
}
