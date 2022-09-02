<?php

namespace App\Http\Requests;

use App\Models\Satisfaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSatisfactionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('satisfaction_edit');
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
            'employee_id' => [
                'string',
                'nullable',
            ],
            'rate' => [
                'numeric',
                'min:1',
                'max:5',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
