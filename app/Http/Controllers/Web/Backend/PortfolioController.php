<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Psy\Readline\Hoa\Console;
use Yajra\DataTables\DataTables;


class PortfolioController extends Controller
{
    /**
     * Display a listing of the portfolio resources.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $portfolios = Portfolio::latest()->get()->map(function ($portfolio, $key) {
                $portfolio->DT_RowIndex = $key + 1; // Dynamically add row index
                return $portfolio;
            });
    
            return DataTables::of($portfolios)
                ->addIndexColumn() // Automatically adds the DataTables index
                ->addColumn('images', function ($data) {
                    if (isset($data->images) && count($data->images) > 0) {
                        // Get the last image
                        $lastImage = $data->images[count($data->images) - 1];
                        $url = asset('backend/img/avatars/' . $lastImage);
    
                        return '<img src="' . $url . '" alt="Last Image" width="50px" height="50px" style="margin-left:20px;">';
                    }
    
                    return 'No Image';
                })
                ->addColumn('dynamic_id', function ($data) {
                    return $data->DT_RowIndex; // Include the dynamic ID
                })
                ->rawColumns(['images'])
                ->make(true);
        }
    
        return view('backend.layouts.portfolios.index');
    }
    


    /**
     * Show the form for creating a new portfolio.
     */
    public function create()
    {
        return view('backend.layouts.portfolios.create');
    }

    /**
     * Store a newly created portfolio in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'title_EESS' => 'required|string|max:255',
            'title_IINN' => 'required|string|max:255',
            'sub_Title_EESS' => 'required|string|max:255',
            'sub_Title_IINN' => 'required|string|max:255',
            'sub_desc_EESS' => 'required|string',
            'sub_desc_IINN' => 'required|string',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'  // Ensure valid image upload
        ]);
    
      $validated;
    
        // Handle the images upload
        if ($request->hasFile('images')) {
            $uploadedImages = [];
            foreach ($request->file('images') as $file) {
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('backend/img/avatars'), $name);
                $uploadedImages[] = $name;
            }
            
            $validated['images'] = $uploadedImages;  // Save as JSON
        }
        // dd( $validated);
        // Create a new Portfolio record in the database
        Portfolio::create($validated);
    
        return redirect()->route('portfolios.index')->with('success', 'Portfolio created successfully.');
    }
    

    /**
     * Show the form for editing the specified portfolio.
     */
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('backend.layouts.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified portfolio in storage.
     */
    public function update(Request $request, $id)
{
    $portfolio = Portfolio::findOrFail($id);

    // Validate incoming request data
    $validated = $request->validate([
        'title_EESS' => 'required|string|max:255',
        'title_IINN' => 'required|string|max:255',
        'sub_Title_EESS' => 'required|string|max:255',
        'sub_Title_IINN' => 'required|string|max:255',
        'sub_desc_EESS' => 'required|string',
        'sub_desc_IINN' => 'required|string',
        'images' => 'nullable|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle image uploads
    if ($request->hasFile('images')) {
        $uploadedImages = [];
        foreach ($request->file('images') as $file) {
            try {
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('backend/img/avatars'), $name);
                $uploadedImages[] = $name;
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()]);
            }
        }

        // Merge new images with existing ones without overwriting previous images
        $validated['images'] = array_merge($portfolio->images ?? [], $uploadedImages);
    }

    // Update portfolio record in the database
    $portfolio->update($validated);

    return redirect()->route('portfolios.index')->with('success', 'Portfolio updated successfully.');
}

    /**
     * Remove the specified portfolio from storage.
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);

        if (!$portfolio) {
            return response()->json(['message' => 'Portfolio not found'], 404);
        }

        $portfolio->delete();

        return response()->json(['message' => 'Portfolio deleted successfully']);
    }
}
