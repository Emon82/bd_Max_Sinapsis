<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;


class AboutController extends Controller
{
    public function index(Request $request)
    {


        if ($request->ajax()) {
            $abouts = About::all()->map(function ($about, $key) {
                $about->DT_RowIndex = $key + 1;
                $about->image = Storage::url($about->image); // Generates the correct public URL
                return $about;
            });

            return response()->json(['data' => $abouts]);
        }

        return view("backend.layouts.abouts.index");
    }


    public function edit(string $id)
    {
        $abouts = About::findOrFail($id);
        return view('backend.layouts.abouts.edit', compact('abouts'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'content_EESS' => 'required|string',
            'content_IINN' => 'required|string',
            'image' => 'nullable|image|max:2048', // Validate image file
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('images', 'public');
            $data['image'] = $filePath; // Save the path to the database
        }

        About::create($data);
        return redirect()->route('about.index')->with('success', 'About added successfully.');
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'content_EESS' => 'required|string',
            'content_IINN' => 'required|string',
            'image' => 'nullable|image|max:2048', // Validate the image file
        ]);
        $abouts = About::findOrFail($id);

        // Get all request data except the image
        $data = $request->except('image');

        // Handle the image upload
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('images', 'public');
            $data['image'] = $filePath;
        }
        // dd($creative);

        // Update the Creative model with new data
        $abouts->update($data);

        return redirect()->route('about.index')->with('success', 'Abouts updated successfully.');
    }



    public function create()
    {
        return view('backend.layouts.abouts.create');
    }



    public function destroy($id)
    {
        $abouts = About::find($id);
        // dd($service);
        if (!$abouts) {
            return response()->json(['message' => 'About not found'], 404);
        }

        $abouts->delete();

        return response()->json(['message' => 'About deleted successfully']);
    }
}
