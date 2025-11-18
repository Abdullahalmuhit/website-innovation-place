<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormAutoReply;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use App\Models\Contact;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $contactInfo = Contact::create($request->all());

        try {
            // Send email to admin
            Mail::to('ab@gmail.com')->send(new ContactFormMail($request->all()));

            // Send auto-reply to user
            Mail::to($request->email)->send(new ContactFormAutoReply($request->all()));

            return response()->json([
                'success' => true,
                'message' => 'Thank you for contacting us! We will get back to you soon.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, there was an error sending your message. Please try again.'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Thank you! We will contact you soon.'
        ]);
    }

    public function send()
    {

    }
}
