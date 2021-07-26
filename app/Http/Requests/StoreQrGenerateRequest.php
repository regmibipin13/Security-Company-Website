<?php

namespace App\Http\Requests;

use App\Models\QrGenerate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQrGenerateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('qr_generate_create');
    }

    public function rules()
    {
        return [];
    }
}
