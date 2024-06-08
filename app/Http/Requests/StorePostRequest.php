<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
			'title' => 'required|string',
			'slug' => 'nullable|string|unique:posts',
			'content' => 'required|string',
			'excerpt' => 'required|string',
			'author' => 'required|string',
			'category_id' => 'required|integer|exists:categories,id',

        ];
    }
}
