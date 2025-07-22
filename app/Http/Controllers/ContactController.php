<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\ContactMessage;
use App\Rules\ReCaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {

        return view('frontend.pages.contact');
    }

    public function mail(Request $request)
    {
        // dd($request->toArray());

        $data = $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'subject' => 'required|nullable|min:4',
            'message' => 'required|string|max:1000',
            // 'g-recaptcha-response' => [new ReCaptcha()]

        ]);
        $to = $request->email;
        $subject = "Message Received";
        $message = "Thanks for contacting us. We'll reach out shortly.";

        $contact_message = ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,


        ]);

        //send to user
        // Mail::to($to)->send(new TestMail($subject,$message));

        //send to admin
        // Mail::to('hirashrestha9840@gmail.com')->send(new TestMail("New Contact Mail","New Message from: {$request->email}<br/>Message:{$request->message}"));

        return back()->with('success', 'You message sent successfully.');
    }
}
