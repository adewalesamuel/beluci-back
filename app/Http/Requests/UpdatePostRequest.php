<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'display_url' => 'nullable|string',
			'title' => 'nullable|string',
			'slug' => 'nullable|string',
			'content' => 'nullable|string',
			'excerpt' => 'nullable|string',
			'author' => 'nullable|string',
			'category_id' => 'nullable|integer|exists:categorys,id',

        ];
    }
}
