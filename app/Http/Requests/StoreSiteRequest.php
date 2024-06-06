<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiteRequest extends FormRequest
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
            'logo_url' => 'required|string',
			'favicon_url' => 'required|string',
			'name' => 'required|string',
			'slogan' => 'required|string',
			'phone_number' => 'required|string|unique:sites',
			'primary_color' => 'required|string',
			'secondary_color' => 'required|string',
			'copyright_text' => 'required|string',
			'footer_logo_url' => 'required|string',
			'is_up' => 'required|boolean',
			
        ];
    }
}