<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Http\Requests\UpdateDonatedDateRequest;

class UpdateDonatedDate extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Requests\UpdateDonatedDateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateDonatedDateRequest $request)
    {
        $donor = Donor::where('phone', $request->phone)->first();

        $donor->update(['last_donated_date' => $request->last_donated_date]);

        return redirect(route('index'));
    }
}
