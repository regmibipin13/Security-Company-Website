<?php

namespace App\Http\Requests;

use App\Models\Marketing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMarketingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('marketing_create');
    }

    public function rules()
    {
        return [
            'company_name' => [
                'string',
                'required',
            ],
            'managing_director' => [
                'string',
                'required',
            ],
            'location' => [
                'string',
                'required',
            ],
            'mobile_number' => [
                'string',
                'required',
            ],
            'telephone_number' => [
                'string',
                'required',
            ],
            'secondary_cell_number' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'nullable',
            ],
        ];
    }
}
