<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class AdminSliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $slides = Slider::all();
        return view('admin.sliders.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function edit($id)
    {
        $slider = $this->getSlider($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    public function store(AdminSliderRequest $request)
    {
        $slider = $request->except(['_token', 'thumbnail']);
        $slider = $this->getFile($slider);
        Slider::create($slider);
        return redirect('admin/sliders');
    }

    public function update(AdminSliderRequest $request, $id)
    {
        $slider = $this->getSlider($id);
        $input = Input::only('title','date_location');
        $this->updateFile($slider);
        $slider->update($input);
        return redirect()->back();
    }

    public function getFile($slider)
    {
        $this->createFolder();
        $folder = '/assets/admin/images/sliders/';
        if (Input::hasfile('thumbnail')) {
            $thumbnail = $this->inputFile($folder);
            $slider = array_merge($slider, $thumbnail);
            return $slider;
        }
        return $slider;
    }

    public function updateFile($slider)
    {
        $folder = '/assets/admin/images/sliders/';
        if (Input::hasfile('thumbnail')) {
            File::delete(public_path() . $slider->thumbnail);
            $thumbnail = $this->inputFile($folder);
            $slider->update($thumbnail);
        };
    }

    public function inputFile($folder)
    {
        $thumbnail = Input::file('thumbnail');
        $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
        $path = public_path($folder . $filename);
        Image::make($thumbnail->getRealPath())->fit('2000', '688')->save($path);
        $thumbnail = ['thumbnail' => $folder . $filename];
        return $thumbnail;
    }

    public function createFolder()
    {
        $path = 'assets/admin/images/sliders';
        if (!file_exists($path)) File::makeDirectory($path, 0775, true, true);
    }

    public function destroy(Request $request, $id)
    {
        $slider = $this->getSlider($id);
        File::delete(public_path(). $slider->thumbnail);
        $slider->delete();
        return redirect('/admin/sliders');
    }

    public function getSlider($id)
    {
        $slider = Slider::findorFail($id);
        return $slider;
    }
}
