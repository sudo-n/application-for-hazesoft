<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required',
            'phone_no' => 'required',
            'address1' => 'required',
            'address2' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'zip' => 'required',
            'contact' => 'nullable'
        ];
    }

    /**
     * Validation error messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => "This field is required!"
        ];
    }
}
