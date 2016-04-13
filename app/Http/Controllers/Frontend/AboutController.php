<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Speaker;
use Illuminate\Http\Request;

use App\Http\Requests;

class AboutController extends Controller
{
    public function index()
    {
        $speakers = Speaker::all();
        $about = AboutUs::first();
        return view('frontend.about.index', compact('speakers', 'about'));
    }
}
