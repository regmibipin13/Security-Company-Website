<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyWebsiteRequest;
use App\Http\Requests\StoreWebsiteRequest;
use App\Http\Requests\UpdateWebsiteRequest;
use App\Models\Website;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class WebsiteController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('website_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

//        $websites = Website::with(['media'])->get();
        $website = Website::with(['media'])->first();
        return view('admin.websites.edit', compact('website'));
    }

    public function create()
    {
        abort_if(Gate::denies('website_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.websites.create');
    }

    public function store(StoreWebsiteRequest $request)
    {
        $website = Website::create($request->all());

        if ($request->input('hero_image', false)) {
            $website->addMedia(storage_path('tmp/uploads/' . basename($request->input('hero_image'))))->toMediaCollection('hero_image');
        }

        if ($request->input('about_image', false)) {
            $website->addMedia(storage_path('tmp/uploads/' . basename($request->input('about_image'))))->toMediaCollection('about_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $website->id]);
        }

        return redirect()->route('admin.websites.edit',$website->id);
    }

    public function edit(Website $website)
    {
        abort_if(Gate::denies('website_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.websites.edit', compact('website'));
    }

    public function update(UpdateWebsiteRequest $request, Website $website)
    {
        $website->update($request->all());

        if ($request->input('hero_image', false)) {
            if (!$website->hero_image || $request->input('hero_image') !== $website->hero_image->file_name) {
                if ($website->hero_image) {
                    $website->hero_image->delete();
                }
                $website->addMedia(storage_path('tmp/uploads/' . basename($request->input('hero_image'))))->toMediaCollection('hero_image');
            }
        } elseif ($website->hero_image) {
            $website->hero_image->delete();
        }

        if ($request->input('about_image', false)) {
            if (!$website->about_image || $request->input('about_image') !== $website->about_image->file_name) {
                if ($website->about_image) {
                    $website->about_image->delete();
                }
                $website->addMedia(storage_path('tmp/uploads/' . basename($request->input('about_image'))))->toMediaCollection('about_image');
            }
        } elseif ($website->about_image) {
            $website->about_image->delete();
        }

        return redirect()->route('admin.websites.edit',$website->id);
    }

    public function show(Website $website)
    {
        abort_if(Gate::denies('website_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.websites.show', compact('website'));
    }

    public function destroy(Website $website)
    {
        abort_if(Gate::denies('website_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $website->delete();

        return back();
    }

    public function massDestroy(MassDestroyWebsiteRequest $request)
    {
        Website::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('website_create') && Gate::denies('website_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Website();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
