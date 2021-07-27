<?php

namespace App\Http\Requests;

use App\Models\Certificate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCertificateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('certificate_create');
    }

    public function rules()
    {
        return [
            'qr_code' => [
                'string',
                'nullable',
                'unique:certificates',
            ],
            'name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'course' => [
                'string',
                'required',
            ],
            'trainer' => [
                'string',
                'nullable',
            ],
            'certificate' => [
                'nullable',
            ],
        ];
    }
}
