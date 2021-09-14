<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'district_id',
        'state_id',
        'status',
        'last_donated_date',
    ];

    public function getDistrictNameAttribute()
    {
        return optional($this->district)->name;
    }

    public function getStateNameAttribute()
    {   
        return optional($this->state)->name;
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
