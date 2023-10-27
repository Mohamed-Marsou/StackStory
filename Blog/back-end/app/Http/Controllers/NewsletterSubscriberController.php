<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber;

class NewsletterSubscriberController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'nullable',
        ]);

        $subscriber = new NewsletterSubscriber;
        $subscriber->email = $request->input('email');
        $subscriber->first_name = $request->input('name');
        $subscriber->save();

        // Return a response
        return response()->json(['message' => 'Subscription successful'], 201);
    }
}
