<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGalleryRequest extends FormRequest
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
			'title' => 'nullable|string',
			'slug' => 'nullable|string',
			'description' => 'nullable|string',
            'gallery_type_id' => 'nullable|integer|exists:gallery_types,id'
        ];
    }
}
