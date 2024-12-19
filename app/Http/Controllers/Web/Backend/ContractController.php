<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contract;

class ContractController extends Controller
{
    public function index()
    {
        $contacts = Contract::all();
        return view('backend.layouts.contracts.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'mobile' => 'required|string',
            'telephone' => 'required|string',
            'address' => 'required|string',
        ]);

        Contract::create($request->all());
        return back()->with('success', 'Contact created successfully.');
    }

    public function edit($id)
    {
        $contact = Contract::findOrFail($id);
        return view('backend.layouts.contracts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'mobile' => 'required|string',
            'telephone' => 'required|string',
            'address' => 'required|string',
        ]);

        $contact = Contract::findOrFail($id);
        $contact->update($request->all());
        return back()->with('success', 'Contact updated successfully.');
    }

    public function destroy($id)
    {
        $contact = Contract::findOrFail($id);
        $contact->delete();
        return back()->with('success', 'Contact deleted successfully.');
    }
}

