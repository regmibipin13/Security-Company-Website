<?php

namespace App\Http\Requests;

use App\Models\TrainingForm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTrainingFormRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('training_form_create');
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
            'contact' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'type' => [
                'string',
                'required',
            ],
            'files.*' => [
                'required',
            ],
        ];
    }
}
