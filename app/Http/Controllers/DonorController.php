<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\State;
use App\Models\District;
use App\Models\BloodGroup;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function index()
    {
        return view('donors.index');
    }

    public function datatable()
    {
        $donors = Donor::with('district', 'state');

        return datatables($donors)
            ->addColumn('name', function ($obj) {
                return $obj->name;
            })
            ->addColumn('phone', function ($obj) {
                return $obj->phone;
            })
            ->addColumn('email', function ($obj) {
                return $obj->email;
            })
            ->addColumn('district', function ($obj) {
                return $obj->district_name;
            })
            ->addColumn('state', function ($obj) {
                return $obj->state_name;
            })
            ->addColumn('status', function ($obj) {
                return $obj->status;
            })
            ->addColumn('last_donated_date', function ($obj) {
                return $obj->last_donated_date;
            })
            ->toJson();
    }

    public function show()
    {
        dd('show');
    }

    public function create()
    {
        $states = State::all();

        $districts = District::where('state_id', optional($states->where('name', 'Kerala')->first())->id ?? optional($states->first())->id)
                                ->get()
                                ->pluck('name', 'id');

        $states = $states->pluck('name', 'id');

        $blood_groups = BloodGroup::all()->pluck('name', 'id');

        return view('donors.create', compact('states', 'districts', 'blood_groups'));
    }

    public function store()
    {
        dd('store');
    }

    public function edit()
    {
        dd('edit');
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
