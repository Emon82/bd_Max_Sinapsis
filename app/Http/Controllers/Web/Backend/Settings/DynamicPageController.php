<?php

namespace App\Http\Controllers\Web\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\DynamicPage;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class DynamicPageController extends Controller
{
    /**
     * Display a listing of the dynamic pages.
     *
     * @param Request $request
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DynamicPage::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('page_title', function ($data) {
                    $page_title = $data->page_title;
                    $status = '<p>'.$page_title.' </p>';
                    return $status;
                })
                ->addColumn('page_content', function ($data) {
                    $page_content = $data->page_content;
                    $status = '<p>'.$page_content.' </p>';
                    return $status;
                })
                ->addColumn('status', function ($data) {
                    $status = ' <div class="form-check form-switch" style="margin-left:40px;">';
                    $status .= ' <input onclick="showStatusChangeAlert(' . $data->id . ')" type="checkbox" class="form-check-input" id="customSwitch' . $data->id . '" getAreaid="' . $data->id . '" name="status"';
                    if ($data->status == "active") {
                        $status .= "checked";
                    }
                    $status .= '><label for="customSwitch' . $data->id . '" class="form-check-label" for="customSwitch"></label></div>';

                    return $status;
                })
                ->addColumn('action', function ($data) {

                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                  <a href="' . route('dynamic_page.edit', ['id' => $data->id]) . '" type="button" class="btn btn-success text-white" title="Edit">
                                  <i class="bi bi-pencil"></i>
                                  </a>
                                  <a href="#" onclick="showDeleteConfirm(' . $data->id . ')" type="button" class="btn btn-danger text-white" title="Delete">
                                  <i class="bi bi-trash"></i>
                                </a>
                                </div>';
                })
                ->rawColumns(['page_title', 'page_content', 'status', 'action'])
                ->make(true);
        }
        return view('backend.layouts.settings.dynamic_page.index');
    }

    /**
     * Show the form for creating a new dynamic page.
     *
     */
    public function create()
    {
        return view('backend.layouts.settings.dynamic_page.create');
    }

    /**
     * Store a newly created dynamic page in the database.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'page_title' => 'required|string|max:100',
                    'page_content' => 'required|string',
                ]);

                // If validation fails, redirect back with errors and input data

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data = new DynamicPage();
                $data->page_title = $request->page_title;
                $data->page_slug = Str::slug($request->page_title);
                $data->page_content = $request->page_content;
                $data->save();

            return redirect()->route('dynamic_page.index')->with('t-success', 'Dynamic Page Created Successfully.');
        } catch (Exception $e) {
            return redirect()->route('dynamic_page.index')->with('t-success', 'Dynamic Page Failed To Create.');
        }
    }

    /**
     * Show the form for editing the specified dynamic page.
     *
     * @param int $id
     */
    public function edit($id)
    {
        $data = DynamicPage::find($id);
        return view('backend.layouts.settings.dynamic_page.edit', compact('data'));
    }


    /**
     * Update the specified dynamic page in the database.
     *
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'page_title' => 'required|string|max:100',
                    'page_content' => 'required|string',
                ]);

                // If validation fails, redirect back with errors and input data
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data = DynamicPage::findOrFail($id);
                $data->page_title = $request->page_title;
                $data->page_slug = Str::slug($request->page_title);
                $data->page_content = $request->page_content;
                $data->update();

                return redirect()->route('dynamic_page.index')->with('t-success', 'Dynamic Page Updated Successfully.');

        } catch (Exception $e) {
            return redirect()->route('dynamic_page.index')->with('t-success', 'Dynamic Page Failed To Update');
        }
    }

    /**
     * Remove the specified dynamic page from the database.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        $data = DynamicPage::findOrFail($id);
        $data->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted successfully.',
        ]);
    }

    /**
     * Change the status of the specified dynamic page.
     *
     * @param int $id
     */
    public function status($id)
    {
        $data = DynamicPage::where('id', $id)->first();
        if ($data->status == 'active') {
            // If the current status is active, change it to inactive
            $data->status = 'inactive';
            $data->save();

            // Return JSON response indicating success with message and updated data
            return response()->json([
                'success' => false,
                'message' => 'Unpublished Successfully.',
                'data' => $data,
            ]);
        } else {
            // If the current status is inactive, change it to active
            $data->status = 'active';
            $data->save();

            // Return JSON response indicating success with a message and updated data.
            return response()->json([
                'success' => true,
                'message' => 'Published Successfully.',
                'data' => $data,
            ]);
        }
    }
}
