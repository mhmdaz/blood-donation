<?php

namespace App\View\Components\Donor;

use App\Models\BloodGroup;
use App\Models\District;
use App\Models\State;
use Illuminate\View\Component;

class Form extends Component
{
    public $blood_groups;

    public $districts;

    public $states;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $states = State::all();

        $this->districts = District::where('state_id', optional($states->where('name', 'Kerala')->first())->id ?? optional($states->first())->id)
                                ->get()
                                ->pluck('name', 'id');

        $this->states = $states->pluck('name', 'id');

        $this->blood_groups = BloodGroup::all()->pluck('name', 'id');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.donor.form');
    }
}