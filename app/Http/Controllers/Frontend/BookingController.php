<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Models\PricePlan;

class BookingController extends Controller
{
    public function index()
    {
        $plans = PricePlan::all();
        return view('frontend.bookings.index', compact('plans'));
    }
}
