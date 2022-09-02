<?php

namespace App\Http\Requests;

use App\Models\EmployeeForm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmployeeFormRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employee_form_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'additional_message' => [
                'nullable',
            ],
        ];
    }
}
