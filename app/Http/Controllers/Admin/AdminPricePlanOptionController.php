<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricePlan;
use App\Models\PricePlanOption;
use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;

class AdminPricePlanOptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function store(Request $request)
    {
        PricePlanOption::create($request->all());
        Flash::message('Option has been created');
        return redirect()->back();
    }

    public function create()
    {
        $plans = PricePlan::all();
        return view('admin.planOptions.create', compact('plans'));
    }

    public function edit($id)
    {
        $option = PricePlanOption::findorFail($id);
        return view('admin.planOptions.edit', compact('option'));
    }

    public function update(Request $request, $id)
    {
        $option = PricePlanOption::findorFail($id);
        $option->fill($request->all())->save();
        return redirect('/admin/PlanOption/create');
    }

    public function destroy($id)
    {
        $option = PricePlanOption::findorFail($id);
        $option->delete();
        return redirect()->back();
    }
}
