<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DonorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'phone' => [
                'required',
                'string',
                'regex:/[0-9]{10}/',
                'digits:10',
                ($this->route('donor') ?? false) 
                    ? Rule::unique('donors')->ignore($this->route('donor'))
                    : 'unique:donors',
            ],
            'email' => [
                'nullable',
                'email',
                ($this->route('donor') ?? false) 
                    ? Rule::unique('donors')->ignore($this->route('donor'))
                    : 'unique:donors',
            ],
            'blood_group_id' => [
                'required',
                'numeric',
                'exists:blood_groups,id',
            ],
            'district_id' => [
                'required',
                'numeric',
                'exists:districts,id',
            ],
            'state_id' => [
                'required',
                'numeric',
                Rule::exists('districts')->where(function ($query) {
                    return $query->where('id', request()->district_id);
                }),
            ],
            'last_donated_date' => [
                'nullable',
                'date_format:Y-m-d',
                'before_or_equal:today',
            ],
        ];
    }
}
