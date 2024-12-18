<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;


class ApiProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::all()->map(function ($project) {
            return [
                'id' => $project->id,
                'position' => $project->position,
                'title_EESS' => $project->title_EESS,
                'title_IINN' => $project->title_IINN,
                'location_EESS' => $project->location_EESS,
                'location_IINN' => $project->location_IINN,
                'description_EESS' =>($project->description_EESS),
                'description_IINN' =>($project->description_IINN),
                'updated_at' => $project->updated_at,
            ];
        });

        return response()->json([
            "status" => "success",
            "message" => "Data retrieved successfully.",
            "data" => $projects
        ], 200);
    }
}
