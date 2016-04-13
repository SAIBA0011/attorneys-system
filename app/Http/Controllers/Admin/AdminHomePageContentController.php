<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomePageContentRequest;
use App\Models\HomePage;
use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;

class AdminHomePageContentController extends Controller
{
    public function index()
    {
        $boxes = HomePage::all();
        return view('admin.pages.home.index', compact('boxes'));
    }

    public function create()
    {
        return view('admin.pages.home.create');
    }

    public function store(HomePageContentRequest $request)
    {
        HomePage::create($request->all());
        Flash::message('Your calllout box has been created');
        return redirect('/admin/pages/home/show');
    }

    public function edit($id)
    {
        $box = $this->findbox($id);
        return view('admin.pages.home.edit', compact('box'));
    }

    public function update(HomePageContentRequest $request, $id)
    {
        $box = $this->findbox($id);
        $box->fill( $input = $request->all())->save();
        Flash::message('Your calllout box has been updated');
        return redirect('/admin/pages/home/show');
    }

    public function destroy($id)
    {
        $box = $this->findbox($id);
        $box->delete();
        Flash::message('Your calllout box has been deleted');
        return redirect()->back();
    }

    public function findbox($id)
    {
        $box = HomePage::findorFail($id);
        return $box;
    }

}
