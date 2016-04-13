<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPricePlanRequest;
use App\Models\PricePlan;
use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;

class AdminPricePlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $plans = PricePlan::all();
        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(AdminPricePlanRequest $request)
    {
        PricePlan::create($request->all());
        Flash::message('Plan has been created');
        return redirect('/admin/plans/view');
    }

    public function edit($id)
    {
        $plan = $this->findPlan($id);
        return view('admin.plans.edit', compact('plan'));
    }

    public function update(AdminPricePlanRequest $request, $id)
    {
        $plan = $this->findPlan($id);
        $plan->fill($request->all())->save();
        return redirect('/admin/plans/view');
    }

    public function destroy($id)
    {
        $plan = $this->findPlan($id);
        $plan->delete();
        return redirect()->back();
    }

    public function findPlan($id)
    {
        $plan = PricePlan::findorFail($id);
        return $plan;
    }
}
