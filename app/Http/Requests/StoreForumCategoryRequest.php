<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreForumCategoryRequest extends FormRequest
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
            'display_img_url' => 'nullable|string',
			'name' => 'required|string',
			'slug' => 'nullable|string|unique:forum_categories',
			'description' => 'required|string',
			'forum_category_id' => 'nullable|integer|exists:forum_categories,id',

        ];
    }
}
