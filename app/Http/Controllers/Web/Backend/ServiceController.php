<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    if ($request->ajax()) {
        $services = Service::all()->map(function ($service, $key) {
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
        $validated = $request->validate([
            'title_eess' => 'required|string',
            'title_iinn' => 'required|string',
            'description_eess' => 'required|string',
            'description_iinn' => 'required|string',
        ]);
    
        Service::create($validated);
    
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
    
}
