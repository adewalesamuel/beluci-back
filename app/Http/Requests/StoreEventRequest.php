<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'img_url' => 'required|string',
			'name' => 'required|string',
			'date' => 'required|date',
			'time' => 'required|string',
			'address' => 'required|string',
			'gps_location' => 'required|string',
			'is_payed' => 'required|boolean',
			'price' => 'required|integer',
			'features' => 'required|json',
			'description' => 'required|string',
			
        ];
    }
}