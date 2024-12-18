<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contract;


class ApiContractController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all contracts and map them to the desired JSON structure
        $contracts = Contract::all()->map(function ($contract) {
            return [
                'id' => $contract->id,
                'email' => $contract->email,
                'mobile' => $contract->mobile,
                'teliphone' => $contract->teliphone,
                'address' => $contract->address,
                'created_at' => $contract->created_at,
                'updated_at' => $contract->updated_at
            ];
        });

        return response()->json([
            "status" => "success",
            "message" => "Data retrieved successfully.",
            "data" => $contracts
        ], 200);
    }
}
