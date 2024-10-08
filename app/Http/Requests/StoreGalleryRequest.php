<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryRequest extends FormRequest
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
			'title' => 'required|string',
			'slug' => 'nullable|string|unique:galleries',
			'description' => 'required|string',
            'event_id' => 'nullable|integer|exists:events,id'

        ];
    }
}
