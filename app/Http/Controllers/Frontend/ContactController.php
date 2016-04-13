<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\ContactRequestForm;
use App\Http\Requests;
use Illuminate\Routing\Controller;
use Laracasts\Flash\Flash;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact.index');
    }

    public function store(ContactRequestForm $request)
    {
        $name = $request->only('name');
        \Mail::send('emails.contact',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'contact_message' => $request->get('contact_message')
            ), function($message)
            {
                $message->from('administrator@eventsys.co.za');
                $message->to('tiaant@saiba.org.za', 'Admin')->subject('Website Enquiry');
            });

        Flash::message('Thank you for your message');
        return redirect()->back();
    }
}
