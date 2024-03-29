<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;
use App\Http\Requests\DonorRequest;

class DonorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('store');
        $this->middleware(['role:super-admin'], ['only' => ['delete']]);
    }

    public function index()
    {
        return view('donors.index');
    }

    public function show()
    {
        dd('show');
    }

    public function create()
    {
        return view('donors.form');
    }

    public function store(DonorRequest $request)
    {
        Donor::create($request->all());

        return redirect(route('donors.index'));
    }

    public function edit(Donor $donor)
    {
        return view('donors.form', [
            'donor' => $donor,
        ]);
    }

    public function update(DonorRequest $request, Donor $donor)
    {
        $donor->update($request->all());

        return redirect(route('donors.index'));
    }

    public function destroy(Donor $donor)
    {
        Donor::destroy($donor->id);

        return redirect(route('donors.index'));
    }
}
