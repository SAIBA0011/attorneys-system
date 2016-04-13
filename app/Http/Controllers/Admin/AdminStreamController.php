<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminStreamRequest;
use App\Models\Stream;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class AdminStreamController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function store(AdminStreamRequest $request)
    {
        Stream::create($request->only('title', 'day_id'));
        Flash::message('Stream has been created :)');
        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $stream = Stream::findorFail($id);
        $stream->delete();
        Flash::message('Stream has been deleted');
        return redirect()->back();
    }
}
