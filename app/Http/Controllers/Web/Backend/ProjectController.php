<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $projects = Project::select(
                'id',
                'title_EESS',
                'title_IINN',
                'location_EESS',
                'location_IINN',
                'description_EESS',
                'description_IINN',
                'position'
            )->orderBy('position', 'asc')->get()->map(function ($project, $key) {
                $project->DT_RowIndex = $key + 1;
                return $project;
            });

            return response()->json(['data' => $projects]);
        }

        return view('backend.layouts.projects.index');
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        return view('backend.layouts.projects.create');
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_EESS' => 'required|string|max:255',
            'title_IINN' => 'required|string|max:255',
            'location_EESS' => 'required|string|max:255',
            'location_IINN' => 'required|string|max:255',
            'description_EESS' => 'required|string',
            'description_IINN' => 'required|string',
        ]);

        $lastPosition = Project::max('position') ?? 0;
        $newPosition = $lastPosition + 1;

        Project::create([
            'title_EESS' => $request->title_EESS,
            'title_IINN' => $request->title_IINN,
            'location_EESS' => $request->location_EESS,
            'location_IINN' => $request->location_IINN,
            'description_EESS' => $request->description_EESS,
            'description_IINN' => $request->description_IINN,
            'position' => $newPosition,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project added successfully');
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('backend.layouts.projects.edit', compact('project'));
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title_EESS' => 'required|string|max:255',
            'title_IINN' => 'required|string|max:255',
            'location_EESS' => 'required|string|max:255',
            'location_IINN' => 'required|string|max:255',
            'description_EESS' => 'required|string',
            'description_IINN' => 'required|string',
        ]);

        $project = Project::findOrFail($id);

        $project->update([
            'title_EESS' => $request->title_EESS,
            'title_IINN' => $request->title_IINN,
            'location_EESS' => $request->location_EESS,
            'location_IINN' => $request->location_IINN,
            'description_EESS' => $request->description_EESS,
            'description_IINN' => $request->description_IINN,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json(['message' => 'Project deleted successfully']);
    }

    /**
     * Swap serial numbers between two projects.
     */
    public function swapSerialNumbers(Request $request, $id)
    {
        $request->validate([
            'new_serial_number' => 'required|integer',
        ]);

        $newPosition = $request->new_serial_number;

        try {
            DB::beginTransaction();

            // Fetch the current project and the project in the new position
            $currentProject = Project::findOrFail($id);
            $targetProject = Project::where('position', $newPosition)->first();

            // Check if the target position exists
            if (!$targetProject) {
                DB::rollBack();
                return response()->json(['message' => 'Target position not found'], 404);
            }

            // Swap positions
            $currentPosition = $currentProject->position;

            $currentProject->update(['position' => $newPosition]);
            $targetProject->update(['position' => $currentPosition]);

            DB::commit();

            return response()->json(['message' => 'Positions successfully swapped'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'An error occurred: ' . $e->getMessage()], 400);
        }
    }
}
