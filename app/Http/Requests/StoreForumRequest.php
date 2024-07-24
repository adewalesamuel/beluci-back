<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreForumRequest extends FormRequest
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
            'name' => 'required|string',
			'slug' => 'nullable|string|unique:forums',
			'display_img_url' => 'nullable|string',
			'description' => 'required|string',
			'is_pinned' => 'nullable|boolean',
			'member_id' => 'nullable|integer|exists:members,id',
			'forum_category_id' => 'required|integer|exists:forum_categories,id',

        ];
    }
}
