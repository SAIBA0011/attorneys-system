<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['title', 'description', 'position'];

    public function sponsor()
    {
        return $this->hasMany(Sponsor::class);
    }
}
