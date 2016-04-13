<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminDayRequest;
use App\Models\Day;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class AdminDayController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $days = $this->getDays()->sortBy('date');
        return view('admin.days.index', compact('days'));
    }

    public function create()
    {
        $days = $this->days();
        return view('admin.days.create', compact('days'));
    }

    public function store(AdminDayRequest $request)
    {
        if (Day::where('title', '=', Input::get('title'))->exists()) {
            Flash::info('Day already exists in database');
        } else
        Day::create(Input::all());

        return redirect(route('admin.days'));
    }

    public function edit(Request $request, $id)
    {
        $day = Day::findorFail($id);
        $days = $this->days();

        return view('admin.days.edit', compact('day','days'));
    }

    public function update(AdminDayRequest $request, $id)
    {
        $day = Day::findorFail($id);
        $input = $request->all();
        $day->fill($input)->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $day = Day::findorFail($id);
        $day->delete();
        Flash::message('Day has been deleted');
        return redirect()->back();
    }

    private function days()
    {
        $days = [
            'Day One'       => 'Day One',
            'Day Two'       => 'Day Two',
            'Day Three'     => 'Day Three',
            'Day Four'      => 'Day Four',
            'Day Five'      => 'Day Five',
            'Day Six'       => 'Day Six',
            'Day Seven'     => 'Day Seven',
            'Day Eight'     => 'Day Eight',
        ];
        return $days;
    }

    private function getDays() {
        $days = Day::all()->sortBy('id');
        return $days;
    }
}
