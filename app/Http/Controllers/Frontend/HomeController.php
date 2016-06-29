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
        $old_partners = Partner::all();
        $sponsors = Sponsor::all();
        $partners = $old_partners->merge($sponsors);

        $about = AboutUs::first();
        return view('frontend.home', compact('partners', 'about'));
    }
}
