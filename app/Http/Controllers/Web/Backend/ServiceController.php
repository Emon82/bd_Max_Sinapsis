<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\DB;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $services = Service::select(
                'id',
                'title_eess',
                'title_iinn',
                'description_eess',
                'description_iinn',
'position'
            )->orderBy('position', 'asc')->get()->map(function ($service, $key) {
                $service->DT_RowIndex = $key + 1;
                return $service;
            });

            return response()->json(['data' => $services]);
        }

        return view('backend.layouts.services.index');
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.layouts.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_eess' => 'required|string|max:255',
            'title_iinn' => 'required|string|max:255',
            'description_eess' => 'required|string',
            'description_iinn' => 'required|string',
        ]);

        // Get the last position or default to 0
        $lastPosition = Service::max('position') ?? 0;
        $newPosition = $lastPosition + 1;

        // Create the new service entry
        Service::create([
            'title_eess' => $request->title_eess,
            'title_iinn' => $request->title_iinn,
            'description_eess' => $request->description_eess,
            'description_iinn' => $request->description_iinn,
            'position' => $newPosition,
        ]);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        return response()->json($service);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Service::findOrFail($id);
        return view('backend.layouts.services.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'title_eess' => 'required|string|max:255',
            'title_iinn' => 'required|string|max:255',
            'description_eess' => 'required|string',
            'description_iinn' => 'required|string',
        ]);

        $service->update($validated);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        // dd($service);
        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }

        $service->delete();

        return response()->json(['message' => 'Service deleted successfully']);
    }

    public function swapSerialNumbers(Request $request, $id)
    {
        $request->validate([
            'new_serial_number' => 'required|integer',
        ]);

        $newPosition = $request->new_serial_number;

        try {
            DB::beginTransaction();

            // Fetch the current project and the project in the new position
            $currentProject = Service::findOrFail($id);
            $targetProject = Service::where('position', $newPosition)->first();

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
