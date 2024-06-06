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
			'slug' => 'required|string|unique:menuitems',
			'icon_url' => 'required|string',
			'type' => 'required|string',
			'is_accent' => 'required|boolean',
			'menu_item_id' => 'required|integer|exists:menu_items,id',
			'menu_id' => 'required|integer|exists:menus,id',
			
        ];
    }
}