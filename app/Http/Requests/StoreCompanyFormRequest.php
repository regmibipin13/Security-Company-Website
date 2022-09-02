<?php

namespace App\Http\Requests;

use App\Models\CompanyForm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCompanyFormRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('company_form_create');
    }

    public function rules()
    {
        return [
            'company_name' => [
                'string',
                'required',
            ],
            'company_location' => [
                'string',
                'required',
            ],
            'company_contact' => [
                'string',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
            ],
            'contact' => [
                'string',
                'required',
            ],
            'subject' => [
                'string',
                'required',
            ],
            'message' => [
                'required',
            ],
        ];
    }
}
