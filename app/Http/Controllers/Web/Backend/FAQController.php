<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FAQController extends Controller
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
        $data = FAQ::latest();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('question', function ($data) {
                    $question      = $data->question;
                    $shortQuestion = strlen($question) > 55 ? substr($question, 0, 55) . '...' : $question;
                    return '<span class="question-tooltip" style="cursor: pointer;" title="' . $question . '">' . $shortQuestion . '</span>';
                })
                ->addColumn('answer', function ($data) {
                    $answer      = $data->answer;
                    $shortAnswer = strlen($answer) > 55 ? substr($answer, 0, 55) . '...' : $answer;
                    return '<span class="question-tooltip" style="cursor: pointer;" title="' . $answer . '">' . $shortAnswer . '</span>';
                })
                ->addColumn('status', function ($data) {
                    $status = ' <div class="form-check form-switch" style="margin-left:10px;">';
                    $status .= ' <input onclick="showStatusChangeAlert(' . $data->id . ')" type="checkbox" class="form-check-input" style="width: 2em;" id="customSwitch' . $data->id . '" getAreaid="' . $data->id . '" name="status"';
                    if ($data->status == "active") {
                        $status .= "checked";
                    }
                    $status .= '><label for="customSwitch' . $data->id . '" class="form-check-label" for="customSwitch"></label></div>';

                    return $status;
                })
                ->addColumn('action', function ($data) {

                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                  <a href="' . route('faq.edit',  $data->id) . '" type="button" class="btn btn-success text-white" title="Edit">
                                  <i class="bi bi-pencil"></i>
                                  </a>
                                  <a href="#" onclick="showDeleteConfirm(' . $data->id . ')" type="button" class="btn btn-danger text-white" title="Delete">
                                  <i class="bi bi-trash"></i>
                                </a>
                                </div>';
                })
                ->rawColumns(['question','answer','status', 'action'])
                ->make(true);
        }

        return view('backend.layouts.faq.index');
    }


    /**
     * Show the form for creating a new faq dynamic page.
     */
    public function create()
    {
        return view('backend.layouts.faq.create');
    }



    /**
     * Store a newly created faq page in the database.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer'   => 'required',
        ]);


        $faq = new FAQ();
        $faq->question = $request->question;
        $faq->answer   = $request->answer;
        $faq->save();

        return redirect()->route('faq.index')->with('t-success', 'Faq Created Successfully');
    }

    /**
     * Display the specified faq to edit and update.
     *
     * @param  string  $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */

    public function edit($id)
    {
        return view('backend.layouts.faq.edit',['faq' => FAQ::find($id)]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer'   => 'required',
        ]);


        $faq = FAQ::find($id);
        $faq->question = $request->question;
        $faq->answer   = $request->answer;
        $faq->save();

        return redirect()->route('faq.index')->with('t-success', 'Faq Updated Successfully');
    }
    /**
     * Delete the specified dynamic page from the faq database.
     *
     * @param int $id
     */
    public function destroy($id)
    {

        $faq = FAQ::find($id);

        $faq->delete();

        return response()->json([
            'success' => true,
            'message'   => 'Deleted successfully.',
        ]);
    }


    /**
     * Update the status of a faq.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function status($id)
    {
        $data = FAQ::findOrFail($id);
        //        return $data;


        if ($data->status == 'active') {
            $data->status = 'inactive';
            $data->save();
            return response()->json([
                'success' => false,
                'message' => 'Unpublished Successfully.',
                'data'    => $data,
            ]);
        } else {
            $data->status = 'active';
            $data->save();
            return response()->json([
                'success' => true,
                'message' => 'Published Successfully.',
                'data'    => $data,
            ]);
        }
    }
}
