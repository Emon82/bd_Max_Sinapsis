<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class ApiMessageController extends Controller
{

    public function index(Request $request)
    {
        $Message = Message::all();
        return response()->json($Message);
    }
    public function store(Request $request)
    {
        // Validate the request
      
        $validated = $request->validate([
            'full_name' => 'required|string',
            'telephone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|string',
            'country' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
            'messageType' => 'required|string',
        ]);

        // Create the message
        $message = Message::create($validated);

        // Return JSON response
        return response()->json([
            'success' => true,
            'message' => 'Message submitted successfully.',
            'data' => $message,
        ], 201);
    }
}
