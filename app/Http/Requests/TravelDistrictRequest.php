<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravelDistrictRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'date_of_travel' => ['required', 'date_format:Y-m-d'],
            'duration' => ['required']
        ];
    }
}
