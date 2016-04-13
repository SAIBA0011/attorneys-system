<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminScheduleRequest;
use App\Models\PlenaryPanel;
use App\Models\Speaker;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class AdminPlenaryPanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function store(AdminScheduleRequest $request)
    {
        $panel = PlenaryPanel::create($request->all());
        $panel->speaker()->attach($request->input('speaker_pluck'));
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $speakers = Speaker::pluck('full_name', 'id');
        $panel = PlenaryPanel::whereId($id)->first();

        return view('admin.schedule.edit', compact('panel', 'speakers'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $panel = PlenaryPanel::findorFail($id);
        $panel->fill($request->all())->save();
        $speakers = ($request->input('speaker_pluck')) ?: [];
        $panel->speaker()->sync($speakers);

        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $panel = PlenaryPanel::findorFail($id);
        $speakers = ($request->input('speaker_pluck')) ?: [];
        $panel->speaker()->sync($speakers);
        $panel->delete();

        return redirect()->back();
    }
}
