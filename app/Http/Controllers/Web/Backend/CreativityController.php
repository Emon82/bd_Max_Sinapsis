<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Creative;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;



class CreativityController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $creatives = Creative::orderBy('position', 'asc')->get();

            return DataTables::of($creatives)
                ->addIndexColumn()
                ->addColumn('image', function ($creative) {
                    if ($creative->image) {
                        return asset('storage/' . $creative->image);
                    }
                    return null;
                })
                ->addColumn('action', function ($creative) {
                    return '
                    <button onclick="swapSerialNumbers(' . $creative->id . ')" class="btn btn-info btn-sm ml-2">Swap Serial</button>
                    <button onclick="editCreativity(' . $creative->id . ')" class="btn btn-warning btn-sm">Edit</button>
                    <button onclick="deleteCreativity(' . $creative->id . ')" class="btn btn-danger btn-sm">Delete</button>
                ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.layouts.creativity.index');
    }




    public function edit(string $id)
    {
        $creative = Creative::findOrFail($id);
        return view('backend.layouts.creativity.edit', compact('creative'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title_EESS' => 'required|string',
            'title_IINN' => 'required|string',
            'sub_title_EESS' => 'required|string',
            'sub_title_IINN' => 'required|string',
            'content_EESS' => 'required|string',
            'content_IINN' => 'required|string',
            'image_position' => 'required|string',
            'position' => 'nullable|integer', // Ensure position is an integer or null
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Added image mime type validation
        ]);

        // Get the last position and calculate the new position
        $lastPosition = Creative::max('position') ?? 0;
        $newPosition = $lastPosition + 1;

        // Prepare data for insertion
        $data = $request->except(['image']); // Exclude the image field from request data
        $data['position'] = $newPosition; // Set the new position value

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('images', 'public');
            $data['image'] = $filePath; // Store the image path in the database
        }

        // Insert the data into the database
        Creative::create($data);

        // Redirect with success message
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
        $creative = Creative::findOrFail($id);

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


    public function swapSerialNumbersportfolio(Request $request, $id)
    {
        $request->validate([
            'new_serial_number' => 'required|integer'
        ]);

        try {
            $newPosition = $request->new_serial_number;

            DB::beginTransaction();

            // Find the portfolio with the desired new position
            $oldPortfolio = Creative::where('position', $newPosition)->first();
            $currentPortfolio = Creative::findOrFail($id);

            if (!$oldPortfolio || !$currentPortfolio) {
                DB::rollBack();
                return response()->json(['message' => 'Portfolios not found'], 404);
            }

            // Swap positions
            $oldPortfolio->update(['position' => $currentPortfolio->position]);
            $currentPortfolio->update(['position' => $newPosition]);

            DB::commit();

            return response()->json(['message' => 'Positions successfully swapped']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'An error occurred: ' . $e->getMessage()], 400);
        }
    }
}
