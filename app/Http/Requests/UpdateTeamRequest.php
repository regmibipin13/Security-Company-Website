<?php

namespace App\Http\Requests;

use App\Models\Team;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTeamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('team_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'position' => [
                'string',
                'required',
            ],
            'father_name' => [
                'string',
                'required',
            ],
            'grandfather_name' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'started_from' => [
                'string',
                'required',
            ],
            'ended_at' => [
                'string',
                'nullable',
            ],
            'still_working' => [
                'string',
                'nullable',
            ],
            'is_enabled' => [
                'nullable',
            ]
        ];
    }
}
