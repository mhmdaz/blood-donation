<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

class UpdateDonorStatus extends Controller
{
    public function __invoke(Donor $donor, Request $request)
    {
        $donor->update(['status' => $request->status]);

        $donor->refresh();

        return response()->json([
            'status' => $donor->status
        ]);
    }
}
