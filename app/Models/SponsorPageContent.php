<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorPageContent extends Model
{
    protected $table = 'sponsors_page_content';
    protected $fillable = ['title', 'content'];
}
