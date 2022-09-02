<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTrainingAttendanceRequest;
use App\Http\Requests\StoreTrainingAttendanceRequest;
use App\Http\Requests\UpdateTrainingAttendanceRequest;
use App\Models\TrainingAttendance;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrainingAttendanceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('training_attendance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainingAttendances = TrainingAttendance::with(['employee'])->get();

        $users = User::get();

        return view('admin.trainingAttendances.index', compact('trainingAttendances', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('training_attendance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employees = User::all();

        return view('admin.trainingAttendances.create', compact('employees'));
    }

    public function store(StoreTrainingAttendanceRequest $request)
    {
        $trainingAttendance = TrainingAttendance::create($request->all());

        return redirect()->route('admin.training-attendances.index');
    }

    public function edit(TrainingAttendance $trainingAttendance)
    {
        abort_if(Gate::denies('training_attendance_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employees = User::all();

        $trainingAttendance->load('employee');

        return view('admin.trainingAttendances.edit', compact('employees', 'trainingAttendance'));
    }

    public function update(UpdateTrainingAttendanceRequest $request, TrainingAttendance $trainingAttendance)
    {
        $trainingAttendance->update($request->all());

        return redirect()->route('admin.training-attendances.index');
    }

    public function show(TrainingAttendance $trainingAttendance)
    {
        abort_if(Gate::denies('training_attendance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainingAttendance->load('employee');

        return view('admin.trainingAttendances.show', compact('trainingAttendance'));
    }

    public function destroy(TrainingAttendance $trainingAttendance)
    {
        abort_if(Gate::denies('training_attendance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainingAttendance->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrainingAttendanceRequest $request)
    {
        TrainingAttendance::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
