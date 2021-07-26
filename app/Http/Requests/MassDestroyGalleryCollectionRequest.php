<?php

namespace App\Http\Requests;

use App\Models\GalleryCollection;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGalleryCollectionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('gallery_collection_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:gallery_collections,id',
        ];
    }
}
