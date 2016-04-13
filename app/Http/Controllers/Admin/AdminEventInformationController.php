<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventInfo;
use Illuminate\Http\Request;
use App\Http\Requests;
use Laracasts\Flash\Flash;

class AdminEventInformationController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        return view('admin.information.index');
    }

    public function edit()
    {
        $information = EventInfo::first();
        return view('admin.information.edit', compact('information'));
    }

    public function store(Request $request)
    {
        EventInfo::truncate();
        EventInfo::create($request->all());
        Flash::message('Success! Your information has been stored.');
        return redirect('/admin/event_edit');
    }

    public function update(Request $request, $id)
    {
        $info = EventInfo::findorfail($id);
        $info->fill($request->all())->save();
        Flash::message('Success! Your changes has been saved.');
        return redirect()->back();
    }
}
