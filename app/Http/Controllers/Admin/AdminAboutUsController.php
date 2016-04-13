<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;

class AdminAboutUsController extends Controller
{
    public function edit()
    {
        $about = AboutUs::first();
        return view('admin.pages.about.edit', compact('about'));
    }

    public function create()
    {
       return view('admin.pages.about.create');
    }

    public function store(Request $request)
    {
        AboutUs::truncate();
        AboutUs::create($request->all());
        Flash::message('Your Changes has bee saved!');
        return redirect('admin/view');
    }

    public function update(Request $request, $id)
    {
        $about = AboutUs::find(1)->first();
        $about->fill($request->all())->save();
        Flash::message('Your Changes has bee saved!');
        return redirect()->back();
    }
}
