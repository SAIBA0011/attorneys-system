<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminScheduleRequest;
use App\Models\Day;
use App\Models\PlenaryPanel;
use App\Models\Speaker;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminScheduleController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index($slug)
    {
        $speakers = Speaker::pluck('full_name', 'id');
        $day = Day::where('slug', $slug)->first();
        return view('admin.schedule.index', compact('day', 'speakers'));
    }
}
