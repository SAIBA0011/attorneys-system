<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $categories = Category::all()->sortBy('position');;
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
       return view('admin.categories.create');
    }

    public function store(AdminCategoryRequest $request )
    {
        Category::create($request->all());
        return redirect('/admin/categories/view');
    }

    public function edit(Request $request, $id)
    {
        $category = Category::findorFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findorFail($id);
        $category->fill($request->all())->save();
        return redirect('/admin/categories/view');
    }

    public function destroy($id)
    {
        $category = Category::findorFail($id);
        $category->delete();

        return redirect()->back();
    }
}
