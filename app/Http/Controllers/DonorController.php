<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Donor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDonorRequest;

class DonorController extends Controller
{
    public function index()
    {
        return view('donors.index');
    }

    public function datatable($status = '')
    {
        $donors = Donor::leftJoin('blood_groups', 'blood_groups.id', '=', 'donors.blood_group_id')
                        ->leftJoin('districts', 'districts.id', '=', 'donors.district_id')
                        ->leftJoin('states', 'states.id', '=', 'donors.state_id')
                        ->select('donors.*', 'blood_groups.name AS blood_group_name', 'districts.name AS district_name', 'states.name AS state_name');

        if ('active' === $status) {
            $donors = $donors->where('status', $status)
                             ->where(function($query) {
                                $query->whereDate('last_donated_date', '<', Carbon::now()->subMonth(3))
                                      ->orWhereNull('last_donated_date');
                             });
        }

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
            ->addColumn('blood_group', function ($obj) {
                return $obj->blood_group_name;
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
            ->filterColumn('name', function($query, $keyword) {
                $query->where('donors.name', 'like', "%$keyword%");
            })
            ->filterColumn('phone', function($query, $keyword) {
                $query->where('donors.phone', 'like', "%$keyword%");
            })
            ->filterColumn('email', function($query, $keyword) {
                $query->where('donors.email', 'like', "%$keyword%");
            })
            ->filterColumn('blood_group', function($query, $keyword) {
                $query->where('blood_groups.name', 'like', "%$keyword%");
            })
            ->filterColumn('district', function($query, $keyword) {
                $query->where('districts.name', 'like', "%$keyword%");
            })
            ->filterColumn('state', function($query, $keyword) {
                $query->where('states.name', 'like', "%$keyword%");
            })
            ->filterColumn('last_donated_date', function($query, $keyword) {
                $query->where('donors.last_donated_date', 'like', "%$keyword%");
            })
            ->toJson();
    }

    public function show()
    {
        dd('show');
    }

    public function create()
    {
        return view('donors.create');
    }

    public function store(StoreDonorRequest $request)
    {
        Donor::create($request->all());

        return redirect(route('donors.index'));
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
