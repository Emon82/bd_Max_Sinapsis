<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class ApiPortfolioController extends Controller
{
    public function index(Request $request)
    {
        $portfolios = Portfolio::all()->map(function ($portfolio) {
            return [
                'id' => $portfolio->id,
                'position' => $portfolio->position,
                'title_EESS' => $portfolio->title_EESS,
                'title_IINN' => $portfolio->title_IINN,
                'sub_Title_EESS' => $portfolio->sub_Title_EESS,
                'sub_Title_IINN' => $portfolio->sub_Title_IINN,
                'sub_desc_EESS' => ($portfolio->sub_desc_EESS),
                'sub_desc_IINN' => ($portfolio->sub_desc_IINN),
                'images' => $portfolio->images,
                'updated_at' => $portfolio->updated_at,
            ];
        });

        return response()->json([
            "status" => "success",
            "message" => "Data retrieved successfully.",
            "data" => $portfolios
        ], 200);
    }
}
