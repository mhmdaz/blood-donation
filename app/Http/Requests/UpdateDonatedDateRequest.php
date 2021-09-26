<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDonatedDateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => [
                'required',
                'exists:donors',
            ],
            'date_of_birth' => [
                'required',
                'date_format:Y-m-d',
                Rule::exists('donors')->where(function ($query) {
                    return $query->where('phone', $this->phone);
                }),
            ],
            'last_donated_date' => [
                'required',
                'date_format:Y-m-d',
                'before_or_equal:today',
            ],
        ];
    }
}
