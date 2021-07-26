<?php

namespace App\Http\Requests;

use App\Models\GalleryCollection;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGalleryCollectionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gallery_collection_create');
    }

    public function rules()
    {
        return [
            'collection_name' => [
                'string',
                'required',
            ],
            'files.*' => [
                'required',
            ],
        ];
    }
}
