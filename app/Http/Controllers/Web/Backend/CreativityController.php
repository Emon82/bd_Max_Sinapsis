<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Creative;

class CreativityController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $creatives = Creative::all()->map(function ($creative, $key) {
                $creative->DT_RowIndex = $key + 1;
                $creative->image= asset('storage/' . $creative->image);
                return $creative;
            });
    
            return response()->json(['data' => $creatives]);
        }
    
        return view("backend.layouts.creativity.index");
    }



public function edit(string $id)
{
    $creative = Creative::findOrFail($id);
    return view('backend.layouts.creativity.edit', compact('creative'));
}

public function store(Request $request)
{
    $request->validate([
        'title_EESS' => 'required|string',
        'title_IINN' => 'required|string',
        'content_EESS' => 'required|string',
        'content_IINN' => 'required|string',
        'image_position' => 'required|string',
        'image' => 'nullable|image|max:2048', // Validate image file
    ]);

    $data = $request->all();

    // Handle image upload
    if ($request->hasFile('image')) {
        $filePath = $request->file('image')->store('images', 'public');
        $data['image'] = $filePath; // Save the path to the database
    }

    Creative::create($data);
    return redirect()->route('creativity.index')->with('success', 'Creative added successfully.');
}


public function update(Request $request, string $id)
{
    $request->validate([
        'title_EESS' => 'required|string',
        'title_IINN' => 'required|string',
        'content_EESS' => 'required|string',
        'content_IINN' => 'required|string',
        'image_position' => 'required|string',
        'image' => 'nullable|image|max:2048', // Validate the image file
    ]);
    $creative= Creative::findOrFail($id);

    // Get all request data except the image
    $data = $request->except('image');

    // Handle the image upload
    if ($request->hasFile('image')) {
        $filePath = $request->file('image')->store('images', 'public');
        $data['image'] = $filePath;
    }
    // dd($creative);

    // Update the Creative model with new data
    $creative->update($data);

    return redirect()->route('creativity.index')->with('success', 'Creative updated successfully.');
}


public function create()
    {
        return view('backend.layouts.creativity.create');
    }


    
public function destroy($id)
    {
        $creatives = Creative::find($id);
    // dd($service);
        if (!$creatives) {
            return response()->json(['message' => 'creatives not found'], 404);
        }
    
        $creatives->delete();
    
        return response()->json(['message' => 'creatives deleted successfully']);
    }

}
