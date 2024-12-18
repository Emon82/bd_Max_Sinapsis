<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;


class ApiAboutController extends Controller
{
    public function index(Request $request)
    {
        $abouts = About::all()->map(function ($about) {
            return [
                'id' => $about->id,
                'content_EESS' => $about->content_EESS,
                'content_IINN' => $about->content_IINN,
                'image' => url('storage/' . $about->image),
                'updated_at' => $about->updated_at,
            ];
        });

        return response()->json([
            "status" => "success",
            "message" => "Data retrieved successfully.",
            "data" => $abouts
        ], 200);
    }
}
