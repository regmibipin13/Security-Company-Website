<?php

namespace App\Http\Requests;

use App\Models\Marketing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMarketingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('marketing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:marketings,id',
        ];
    }
}
