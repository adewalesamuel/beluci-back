<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateForumRequest extends FormRequest
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
            'name' => 'nullable|string',
			'slug' => 'nullable|string',
			'display_img_url' => 'nullable|string',
			'description' => 'nullable|string',
			'is_pinned' => 'nullable|boolean',
			'member_id' => 'nullable|integer|exists:members,id',
			'forum_category_id' => 'nullable|integer|exists:forum_categories,id',

        ];
    }
}
