<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('frontend.partners.index', compact('partners'));
    }

    public function show($slug)
    {
        $partner = Partner::whereSlug($slug)->first();
        return view('frontend.partners.show', compact('partner'));
    }
}
