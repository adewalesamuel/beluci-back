<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
            'logo_url' => 'nullable|string',
			'company_name' => 'required|string',
			'country_name' => 'required|string',
			'head_office' => 'nullable|string',
			'address' => 'required|string',
			'website_url' => 'nullable|string',
			'fullname' => 'nullable|string',
			'creation_date' => 'required|date',
			'employee_number' => 'required|integer',
			'legal_status' => 'required|string',
			'share_capital' => 'required|integer',
			'sector' => 'required|string',
			'other_details' => 'required|string',
			'company_category' => 'required|string',
			'parent_company' => 'nullable|string',
			'representative_fullname' => 'required|string',
			'position' => 'required|string',
			'nationality' => 'required|string',
			'email' => 'required|string|unique:members',
			'phone_number' => 'required|string|unique:members',
			'sales_representative_fullname' => 'required|string',
			'sales_representative_position' => 'required|string',
			'sales_representative_email' => 'required|string',
			'sales_representative_phone_number' => 'required|string',
			'cover_letter_url' => 'nullable|string',
			'photo_url' => 'nullable|string',
			'commercial_register_url' => 'nullable|string',
			'idcard_url' => 'nullable|string',
			'password' => 'nullable|string',
            'is_validated' => 'nullable|boolean',
			'member_id' => 'nullable|integer|exists:members,id',
            'member_source' => 'nullable|string',
            'sales_representative_nationality' => 'nullable|string',

        ];
    }
}
