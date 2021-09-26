<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDonorRequest;

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

    public function store(StoreDonorRequest $request)
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

    public function update()
    {
        dd('update');
    }

    public function destroy()
    {
        dd('destroy');
    }
}
