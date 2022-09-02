<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTrainingFormRequest;
use App\Http\Requests\StoreTrainingFormRequest;
use App\Http\Requests\UpdateTrainingFormRequest;
use App\Models\TrainingForm;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TrainingFormController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('training_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainingForms = TrainingForm::with(['media'])->get();

        return view('admin.trainingForms.index', compact('trainingForms'));
    }

    public function create()
    {
        abort_if(Gate::denies('training_form_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trainingForms.create');
    }

    public function store(StoreTrainingFormRequest $request)
    {
        $trainingForm = TrainingForm::create($request->all());

        foreach ($request->input('files', []) as $file) {
            $trainingForm->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $trainingForm->id]);
        }

        return redirect()->route('admin.training-forms.index');
    }

    public function edit(TrainingForm $trainingForm)
    {
        abort_if(Gate::denies('training_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trainingForms.edit', compact('trainingForm'));
    }

    public function update(UpdateTrainingFormRequest $request, TrainingForm $trainingForm)
    {
        $trainingForm->update($request->all());

        if (count($trainingForm->files) > 0) {
            foreach ($trainingForm->files as $media) {
                if (!in_array($media->file_name, $request->input('files', []))) {
                    $media->delete();
                }
            }
        }
        $media = $trainingForm->files->pluck('file_name')->toArray();
        foreach ($request->input('files', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $trainingForm->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
            }
        }

        return redirect()->route('admin.training-forms.index');
    }

    public function show(TrainingForm $trainingForm)
    {
        abort_if(Gate::denies('training_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trainingForms.show', compact('trainingForm'));
    }

    public function destroy(TrainingForm $trainingForm)
    {
        abort_if(Gate::denies('training_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainingForm->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrainingFormRequest $request)
    {
        TrainingForm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('training_form_create') && Gate::denies('training_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TrainingForm();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
