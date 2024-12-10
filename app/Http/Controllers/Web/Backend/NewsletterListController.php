<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class NewsletterListController extends Controller
{
     /**
     * Displays the list of frequently asked questions(faq).
     *
     * This method handles AJAX requests to fetch and return faq's data
     * in a format suitable for DataTables, including columns for publish
     * products. If not an AJAX request, it returns the main view for process.
     *
     * @param Request $request The incoming HTTP request.
     */
    public function index(Request $request)
    {
        $data = Newsletter::latest();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {

                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                  <a href="#" onclick="showDeleteConfirm(' . $data->id . ')" type="button" class="btn btn-danger text-white" title="Delete">
                                  <i class="bi bi-trash"></i>
                                </a>
                                </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.layouts.newsletter.index');
    }

    /**
     * Delete the specified dynamic page from the faq database.
     *
     * @param int $id
     */
    public function destroy($id)
    {

        $data = Newsletter::find($id);

        $data->delete();

        return response()->json([
            'success' => true,
            'message'   => 'Deleted successfully.',
        ]);
    }
}
