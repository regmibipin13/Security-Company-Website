<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyGalleryCollectionRequest;
use App\Http\Requests\StoreGalleryCollectionRequest;
use App\Http\Requests\UpdateGalleryCollectionRequest;
use App\Models\GalleryCollection;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GalleryCollectionsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('gallery_collection_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = GalleryCollection::query()->select(sprintf('%s.*', (new GalleryCollection())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'gallery_collection_show';
                $editGate = 'gallery_collection_edit';
                $deleteGate = 'gallery_collection_delete';
                $crudRoutePart = 'gallery-collections';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('collection_name', function ($row) {
                return $row->collection_name ? $row->collection_name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.galleryCollections.index');
    }

    public function create()
    {
        abort_if(Gate::denies('gallery_collection_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galleryCollections.create');
    }

    public function store(StoreGalleryCollectionRequest $request)
    {
        $galleryCollection = GalleryCollection::create($request->all());

        foreach ($request->input('files', []) as $file) {
            $galleryCollection->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $galleryCollection->id]);
        }

        return redirect()->route('admin.gallery-collections.index');
    }

    public function edit(GalleryCollection $galleryCollection)
    {
        abort_if(Gate::denies('gallery_collection_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galleryCollections.edit', compact('galleryCollection'));
    }

    public function update(UpdateGalleryCollectionRequest $request, GalleryCollection $galleryCollection)
    {
        $galleryCollection->update($request->all());

        if (count($galleryCollection->files) > 0) {
            foreach ($galleryCollection->files as $media) {
                if (!in_array($media->file_name, $request->input('files', []))) {
                    $media->delete();
                }
            }
        }
        $media = $galleryCollection->files->pluck('file_name')->toArray();
        foreach ($request->input('files', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $galleryCollection->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
            }
        }

        return redirect()->route('admin.gallery-collections.index');
    }

    public function show(GalleryCollection $galleryCollection)
    {
        abort_if(Gate::denies('gallery_collection_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galleryCollections.show', compact('galleryCollection'));
    }

    public function destroy(GalleryCollection $galleryCollection)
    {
        abort_if(Gate::denies('gallery_collection_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galleryCollection->delete();

        return back();
    }

    public function massDestroy(MassDestroyGalleryCollectionRequest $request)
    {
        GalleryCollection::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('gallery_collection_create') && Gate::denies('gallery_collection_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new GalleryCollection();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
