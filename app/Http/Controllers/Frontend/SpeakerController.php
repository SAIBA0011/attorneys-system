<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\SpeakerFormRequest;
use App\Models\Speaker;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SpeakerController extends Controller
{
    public function index()
    {
        $speakers = Speaker::paginate(8);
        return view('frontend.speakers.index', compact('speakers'));
    }

    public function show($slug)
    {
        $speaker = Speaker::whereSlug($slug)->first();
        return view('frontend.speakers.show', compact('speaker'));
    }
}
