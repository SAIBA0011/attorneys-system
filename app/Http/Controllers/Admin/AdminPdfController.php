<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchedulePdf;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;

class AdminPdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $files = SchedulePdf::all();
        return view('admin.pdf.index', compact('files'));
    }

    public function store(Request $request)
    {
        $pdf = $request->except(['_token', 'file']);
        $folder = 'assets/frontend/pdf';
        $fileName = 'summary.pdf';

        if (Input::hasfile('file'))
        {
            DB::table('schedule_pdf')->delete();
            Input::file('file')->move($folder, $fileName);
            $file = ['file' => $folder . '/' . $fileName];
            $pdf = array_merge($pdf, $file);
        }

        SchedulePdf::create($pdf);
        Flash::message('Your file was uploaded');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $file = SchedulePdf::findorFail($id);
        File::delete(public_path(), $file->file);
        Flash::message('File has been deleted');

        $file->delete();
        return redirect()->back();
    }
}
