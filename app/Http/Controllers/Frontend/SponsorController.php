<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Sponsor;
use Illuminate\Http\Request;

use App\Http\Requests;

class SponsorController extends Controller
{
    public function index()
    {
        $categories = Category::all()->sortBy('position');
        return view('frontend.sponsors.index', compact('categories'));
    }

    public function show($slug)
    {
        $sponsor = Sponsor::whereSlug($slug)->first();
        return view('frontend.sponsors.show', compact('sponsor'));
    }
}
