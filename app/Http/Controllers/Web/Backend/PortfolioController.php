<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the portfolio resources.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $portfolios = Portfolio::orderBy('position', 'asc')->latest()->get()->map(function ($portfolio, $key) {
                $portfolio->DT_RowIndex = $key + 1;
                return $portfolio;
            });

            return DataTables::of($portfolios)
                ->addIndexColumn()
                ->addColumn('images', function ($data) {
                    if (isset($data->images) && count($data->images) > 0) {
                        $lastImage = $data->images[count($data->images) - 1];
                        $url = asset('backend/img/avatars/' . $lastImage);

                        return '<img src="' . $url . '" alt="Last Image" width="50px" height="50px" style="margin-left:20px;">';
                    }

                    return 'No Image';
                })
                ->addColumn('dynamic_id', function ($data) {
                    return $data->DT_RowIndex;
                })
                ->rawColumns(['images'])
                ->make(true);
        }

        return view('backend.layouts.portfolios.index');
    }

    /**
     * Store a newly created portfolio in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_EESS' => 'required|string|max:255',
            'title_IINN' => 'required|string|max:255',
            'sub_Title_EESS' => 'required|string|max:255',
            'sub_Title_IINN' => 'required|string|max:255',
            'sub_desc_EESS' => 'required|string',
            'sub_desc_IINN' => 'required|string',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $lastPosition = Portfolio::max('position') ?? 0;
        $newPosition = $lastPosition + 1;

        if ($request->hasFile('images')) {
            $uploadedImages = [];
            foreach ($request->file('images') as $file) {
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('backend/img/avatars'), $name);
                $uploadedImages[] = $name;
            }
            $validated['images'] = $uploadedImages;
        }

        $validated['position'] = $newPosition;

        Portfolio::create($validated);

        return redirect()->route('portfolios.index')->with('success', 'Portfolio created successfully.');
    }

    /**
     * Update the specified portfolio in storage.
     */
    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

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
            $validated['images'] = array_merge($portfolio->images ?? [], $uploadedImages);
        }

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

    /**
     * Swap the positions of two portfolios.
     */
    public function swapSerialNumbersportfolio(Request $request, $id)
    {
        $request->validate([
            'new_serial_number' => 'required|integer'
        ]);

        try {
            $newPosition = $request->new_serial_number;

            DB::beginTransaction();

            // Find the portfolio with the desired new position
            $oldPortfolio = Portfolio::where('position', $newPosition)->first();
            $currentPortfolio = Portfolio::findOrFail($id);

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
