<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEmployeeFormRequest;
use App\Http\Requests\StoreEmployeeFormRequest;
use App\Http\Requests\UpdateEmployeeFormRequest;
use App\Models\EmployeeForm;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class EmployeeFormController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('employee_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employeeForms = EmployeeForm::with(['media'])->get();

        return view('admin.employeeForms.index', compact('employeeForms'));
    }

    public function create()
    {
        abort_if(Gate::denies('employee_form_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.employeeForms.create');
    }

    public function store(StoreEmployeeFormRequest $request)
    {
        $employeeForm = EmployeeForm::create($request->all());

        foreach ($request->input('files', []) as $file) {
            $employeeForm->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $employeeForm->id]);
        }

        return redirect()->route('admin.employee-forms.index');
    }

    public function edit(EmployeeForm $employeeForm)
    {
        abort_if(Gate::denies('employee_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.employeeForms.edit', compact('employeeForm'));
    }

    public function update(UpdateEmployeeFormRequest $request, EmployeeForm $employeeForm)
    {
        $previousStatus = $employeeForm->approved;
        
        $employeeForm->update($request->all());

        if (count($employeeForm->files) > 0) {
            foreach ($employeeForm->files as $media) {
                if (!in_array($media->file_name, $request->input('files', []))) {
                    $media->delete();
                }
            }
        }
        $media = $employeeForm->files->pluck('file_name')->toArray();
        foreach ($request->input('files', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $employeeForm->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
            }
        }
        
        if(!$previousStatus && $request->approved) {
            \Mail::raw("Hello ".$employeeForm->name." Your Training form has been approved from our side . Contact Us Or Visit our Office For More Information about Training . If you dont know how to contact us . PLease follow up this link https://titanicsecurity.com/contact-us", function($message) use ($employeeForm) {
                $message->subject('no reply')->to($employeeForm->email);
            });
        }
        

        return redirect()->route('admin.employee-forms.index');
    }

    public function show(EmployeeForm $employeeForm)
    {
        abort_if(Gate::denies('employee_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.employeeForms.show', compact('employeeForm'));
    }

    public function destroy(EmployeeForm $employeeForm)
    {
        abort_if(Gate::denies('employee_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employeeForm->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmployeeFormRequest $request)
    {
        EmployeeForm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('employee_form_create') && Gate::denies('employee_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new EmployeeForm();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
