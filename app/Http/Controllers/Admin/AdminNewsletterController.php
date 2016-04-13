<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class AdminNewsletterController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin')->only('index');
    }

    public function index()
    {
        $subscribers = Newsletter::paginate('10');
        return view('admin.newsletter.show', compact('subscribers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:255',
            'name' => 'required',
        ]);

        if (Newsletter::where('email', '=', Input::get('email'))->exists()) {
            Flash::info('Email already exists in database');

        } else
            Flash::info('Thank you ' . $request->name . ' for subscribing to our newsletter');
            Newsletter::create($request->all());
            return redirect()->back();
    }

    public function destroy($id)
    {
        $subscriber = Newsletter::findorFail($id);

        $subscriber->delete();
        Flash::message('Subscriber has been removed');
        return redirect()->back();
    }
}
