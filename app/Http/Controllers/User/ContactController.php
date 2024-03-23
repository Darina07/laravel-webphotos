<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('users.contacts.index');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name'    => 'required|string',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        // Send email
        Mail::to(config('mail.from.address'))->send(new ContactMail($request->name, $request->email, $request->message));
        // Save to database
        Contact::create($request->all());

        return redirect()->back()->with('success-mail-sent', 'Message sent successfully!');
    }
}
