<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'img_url' => 'nullable|string',
			'name' => 'nullable|string',
			'date' => 'nullable|date',
			'time' => 'nullable|string',
			'address' => 'nullable|string',
			'gps_location' => 'nullable|string',
			'is_payed' => 'nullable|boolean',
			'price' => 'nullable|integer',
			'features' => 'nullable|json',
			'description' => 'nullable|string',

        ];
    }
}
