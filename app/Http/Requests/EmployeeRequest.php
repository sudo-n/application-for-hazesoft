<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'department_id' => 'required',
            'email' => 'required|email|unique:employees,email',
            'contact' => 'required',
            'designation' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'required' => 'This field is required',
            'email' => 'Email must be valid format',
            'unique' => 'Already Exists'
        ];
    }
}
