<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validate the email address
        $request->validate([
            'email' => 'required|email',
        ]);

        // Check if the email already exists
        if (Newsletter::where('email', $request->email)->exists()) {
            // Set a session message if email exists
            return back()->with('t-info', 'The email is already subscribed.');
        }

        // Store the email
        Newsletter::create([
            'email' => $request->email,
        ]);

        return back()->with('t-success', 'Thank you for subscribing!');
    }
}
