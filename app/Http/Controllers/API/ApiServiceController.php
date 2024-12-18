<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;


class ApiServiceController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve and map all services
        $services = Service::all()->map(function ($service) {
            return [
                'id' => $service->id,
                'position' => $service->position,
                'title_eess' => $service->title_eess,
                'title_iinn' => $service->title_iinn,
                'description_eess' => ($service->description_eess),
                'description_iinn' => ($service->description_iinn),
                'updated_at' => $service->updated_at,
            ];
        });

        return response()->json([
            "status" => "success",
            "message" => "Data retrieved successfully.",
            "data" => $services
        ], 200);
    }
}
