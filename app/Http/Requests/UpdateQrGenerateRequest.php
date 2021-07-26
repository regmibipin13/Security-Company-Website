<?php

namespace App\Http\Requests;

use App\Models\QrGenerate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQrGenerateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('qr_generate_edit');
    }

    public function rules()
    {
        return [];
    }
}
