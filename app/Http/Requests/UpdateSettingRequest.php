<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_edit');
    }

    public function rules()
    {
        return [
            'site_title' => [
                'string',
                'required',
            ],
            'company_full_address' => [
                'string',
                'required',
            ],
            'company_email' => [
                'required',
            ],
            'google_map_location' => [
                'nullable',
            ],
            'support_number' => [
                'string',
                'required',
            ],
            'facebook_link' => [
                'string',
                'nullable',
            ],
            'instagram_link' => [
                'string',
                'nullable',
            ],
            'twitter_link' => [
                'string',
                'nullable',
            ],
            'linkedin_link' => [
                'string',
                'nullable',
            ],
        ];
    }
}
