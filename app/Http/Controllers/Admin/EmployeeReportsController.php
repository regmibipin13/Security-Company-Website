<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Http\Request;
use App\Models\EmployeeReport;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class EmployeeReportsController extends Controller
{

    use MediaUploadingTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('reports_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $employeeReports = EmployeeReport::all();
        return view('admin.employeeReports.index', compact('employeeReports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('reports_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.employeeReports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasRole('Employee')) {
            $request->merge(['employee_id' => auth()->user()->employee_id]);
        }
        $sanitized = $request->validate([
            'employee_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'description' => 'required',
            'operation' => 'required',
            'location' => 'required',
        ]);

        $employee = User::where('employee_id', $request->employee_id)->first();

        if (!$employee) {
            return redirect()->back()->with('error', 'Employee Id Does not exist in our system');
        }

        $report = EmployeeReport::create($sanitized);

        foreach ($request->input('files', []) as $file) {
            $report->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $report->id]);
        }

        return redirect()->to('/admin/reports')->with('message', 'Report Submitted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('reports_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $employeeReport = EmployeeReport::find($id);
        return view('admin.employeeReports.show', compact('employeeReport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('reports_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $employeeReport = EmployeeReport::find($id);
        return view('admin.employeeReports.edit', compact('employeeReport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->hasRole('Employee')) {
            $request->merge(['employee_id' => auth()->user()->employee_id]);
        }
        $employeeReport = EmployeeReport::find($id);
        $sanitized = $request->validate([
            'employee_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'description' => 'required',
            'operation' => 'required',
        ]);

        $employee = User::where('employee_id', $request->employee_id)->first();

        if (!$employee) {
            return redirect()->back()->with('error', 'Employee Id Does not exist in our system');
        }

        $employeeReport->update($sanitized);

        if (count($employeeReport->files) > 0) {
            foreach ($employeeReport->files as $media) {
                if (!in_array($media->file_name, $request->input('files', []))) {
                    $media->delete();
                }
            }
        }
        $media = $employeeReport->files->pluck('file_name')->toArray();
        foreach ($request->input('files', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $employeeReport->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
            }
        }

        return redirect()->to('/admin/reports')->with('message', 'Report Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('reports_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $employeeReport = EmployeeReport::find($id);
        $employeeReport->delete();
        return redirect()->back()->with('success', 'Report Deleted Successfully');
    }

    public function massDestroy(Request $request)
    {
        EmployeeReport::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('employee_form_create') && Gate::denies('employee_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new EmployeeReport();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
