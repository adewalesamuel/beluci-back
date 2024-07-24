<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateForumCategoryRequest extends FormRequest
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
			'name' => 'nullable|string',
			'slug' => 'nullable|string',
			'description' => 'nullable|string',
			'forum_category_id' => 'nullable|integer|exists:forum_categories,id',

        ];
    }
}
