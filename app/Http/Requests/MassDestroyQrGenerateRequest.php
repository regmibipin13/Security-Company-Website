<?php

namespace App\Http\Requests;

use App\Models\QrGenerate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyQrGenerateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('qr_generate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:qr_generates,id',
        ];
    }
}
