<?php

namespace App\Http\Controllers\Frontend;

use App\Models\AboutUs;
use App\Models\Partner;
use App\Models\Sponsor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $partners = Partner::pluck('thumbnail', 'id')->toArray();
        $sponsors = Sponsor::pluck('thumbnail', 'id')->toArray();
        $images = array_merge($partners, $sponsors);

        $about = AboutUs::first();
        return view('frontend.home', compact('images', 'about'));
    }
}
