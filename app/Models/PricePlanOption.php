<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricePlanOption extends Model
{
    protected $table = 'price_plan_options';
    protected $fillable = ['title', 'full_price', 'early_bird', 'price_plan_id'];

    public function PricePlan()
    {
        return $this->belongsTo(PricePlan::class);
    }
}


