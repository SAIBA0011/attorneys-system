<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventInfo extends Model
{
    protected $table = 'event_info';
    protected $fillable = ['title', 'date', 'venue_name', 'venue_city', 'venue_country', 'street_address', 'latitude', 'longitude'];
}
