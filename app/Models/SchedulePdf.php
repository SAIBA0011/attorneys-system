<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchedulePdf extends Model
{
    protected $table = 'schedule_pdf';
    protected $fillable = ['title', 'file'];
}
