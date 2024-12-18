<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Creative;

class ApiCreativityController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve all creative records and format them
        $creatives = Creative::all()->map(function ($creative) {
            return [
                'id' => $creative->id,
                'title_EESS' => $creative->title_EESS,
                'title_IINN' => $creative->title_IINN,
                'sub_title_EESS' => $creative->sub_title_EESS,
                'sub_title_IINN' => $creative->sub_title_IINN,
                'image' => $creative->image,
                'content_EESS' => $creative->content_EESS,
                'content_IINN' => $creative->content_IINN,
                'image_position' => $creative->image_position,
                'updated_at' => $creative->updated_at,
            ];
        });

        return response()->json([
            "status" => "success",
            "message" => "Data  retrieved successfully.",
            "data" => $creatives
        ], 200);
    }
}
