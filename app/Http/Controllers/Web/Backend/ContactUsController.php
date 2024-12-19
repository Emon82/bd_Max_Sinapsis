<?php

namespace App\Http\Controllers\Web\Backend;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\Contract;

class ContactUsController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            try {
                // Get only the latest contract
                $contract = Contract::select(['id', 'email', 'mobile', 'teliphone', 'address'])
                    ->orderBy('id', 'desc')
                    ->first();

                if ($contract) {
                    // Return contract wrapped in a collection
                    return DataTables::of(collect([$contract]))
                        ->addIndexColumn()
                        ->make(true);
                } else {
                    return response()->json(['data' => []]);
                }
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        return view('backend.layouts.contracts.index');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'mobile' => 'required|string',
            'teliphone' => 'required|string',
            'address' => 'required|string',
        ]);

        $contract = Contract::create($validatedData);

        return redirect('getcontact-address')->with('message', 'Contract created successfully');
    }



    public function create()
    {
        return view('backend.layouts.contracts.create');
    }

    public function edit($id)
    {
        $contract  = Contract::findOrFail($id);
        return view('backend.layouts.contracts.edit', compact('contract'));
    }

    public function update(Request $request, $id)
    {
        $contract = Contract::findOrFail($id);

        $contract->update([
            'email' => $request->email,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'teliphone' => $request->teliphone,
        ]);

        return redirect()->route('contract.index')->with('success', 'Contract updated successfully!');
    }


    public function destroy($id)
    {
        $contact = Contract::findOrFail($id);
        $contact->delete();
        return back()->with('success', 'Contact deleted successfully.');
    }
}
