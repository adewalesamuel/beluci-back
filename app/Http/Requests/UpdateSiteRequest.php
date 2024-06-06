<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiteRequest extends FormRequest
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
            'logo_url' => 'nullable|string',
			'favicon_url' => 'nullable|string',
			'name' => 'nullable|string',
			'slogan' => 'nullable|string',
			'phone_number' => 'nullable|string',
			'primary_color' => 'nullable|string',
			'secondary_color' => 'nullable|string',
			'copyright_text' => 'nullable|string',
			'footer_logo_url' => 'nullable|string',
			'is_up' => 'nullable|boolean',

        ];
    }
}
