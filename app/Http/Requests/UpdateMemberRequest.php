<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
			'company_name' => 'nullable|string',
			'country_name' => 'nullable|string',
			'head_office' => 'nullable|string',
			'address' => 'nullable|string',
			'website_url' => 'nullable|string',
			'fullname' => 'nullable|string',
			'creation_date' => 'nullable|date',
			'employee_number' => 'nullable|integer',
			'legal_status' => 'nullable|string',
			'share_capital' => 'nullable|integer',
			'sector' => 'nullable|string',
			'other_details' => 'nullable|string',
			'company_category' => 'nullable|string',
			'representative_fullname' => 'nullable|string',
			'position' => 'nullable|string',
			'nationality' => 'nullable|string',
			'email' => 'nullable|string',
			'phone_number' => 'nullable|string',
			'sales_representative_fullname' => 'nullable|string',
			'sales_representative_position' => 'nullable|string',
			'sales_representative_email' => 'nullable|string',
			'sales_representative_phone_number' => 'nullable|string',
			'cover_letter_url' => 'nullable|string',
			'photo_url' => 'nullable|string',
			'commercial_register_url' => 'nullable|string',
			'idcard_url' => 'nullable|string',
			'password' => 'nullable|string',
			'member_id' => 'nullable|integer|exists:members,id',

        ];
    }
}
