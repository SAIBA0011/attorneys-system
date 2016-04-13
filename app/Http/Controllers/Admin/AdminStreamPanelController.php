<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminStreamPanelRequest;
use App\Models\Speaker;
use App\Models\StreamPanel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class AdminStreamPanelController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function store(AdminStreamPanelRequest $request)
    {
        $panel = StreamPanel::create($request->all());
        $panel->speakers()->attach($request->input('speaker_pluck'));
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $speakers = Speaker::pluck('full_name', 'id');
        $speakers->prepend('Please Select');
        $panel = StreamPanel::whereId($id)->first();

        return view('admin.streams.edit', compact('panel', 'speakers'));
    }

    public function update(Request $request, $id)
    {
        $panel = $this->findStream($id);
        $panel->fill($request->all())->save();
        $speakers = ($request->input('speaker_pluck')) ?: [];
        $panel->speakers()->sync($speakers);

        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $panel = $this->findStream($id);
        $speakers = ($request->input('speaker_pluck')) ?: [];
        $panel->speakers()->sync($speakers);
        $panel->delete();

        return redirect()->back();
    }

    public function findStream($id)
    {
        $panel = StreamPanel::findorFail($id);
        return $panel;
    }
}
