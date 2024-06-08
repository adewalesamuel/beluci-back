<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuItemRequest extends FormRequest
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
			'slug' => 'nullable|string|unique:menu_items',
			'icon_url' => 'nullable|string',
			'type' => 'nullable|string',
			'is_accent' => 'nullable|boolean',
			'menu_item_id' => 'nullable|integer|exists:menu_items,id',
			'menu_id' => 'required|integer|exists:menus,id',

        ];
    }
}
