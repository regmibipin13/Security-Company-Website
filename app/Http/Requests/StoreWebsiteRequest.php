<?php

namespace App\Http\Requests;

use App\Models\Website;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreWebsiteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('website_create');
    }

    public function rules()
    {
        return [
            'hero_title' => [
                'string',
                'required',
            ],
            'hero_title_2' => [
                'string',
                'required',
            ],
            'hero_text' => [
                'required',
            ],
            'button_1_title' => [
                'string',
                'required',
            ],
            'button_1_link' => [
                'required',
            ],
            'button_2_title' => [
                'string',
                'required',
            ],
            'button_2_link' => [
                'required',
            ],
            'hero_image' => [
                'required',
            ],
            'about_us_text' => [
                'required',
            ],
            'about_image' => [
                'nullable',
            ],
        ];
    }
}
