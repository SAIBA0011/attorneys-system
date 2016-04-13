<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\SchedulePdf;
//use App\SchedulePdf;
use Illuminate\Http\Request;
use App\Http\Requests;

class ScheduleController extends Controller
{
    public function index()
    {
        $days = Day::all()->sortBy('date');
        $file = SchedulePdf::first();
       return view('frontend.schedule.index', compact('days', 'file'));
    }
}
