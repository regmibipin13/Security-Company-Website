<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySatisfactionRequest;
use App\Http\Requests\StoreSatisfactionRequest;
use App\Http\Requests\UpdateSatisfactionRequest;
use App\Models\Satisfaction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SatisfactionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('satisfaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $satisfactions = Satisfaction::all();

        return view('admin.satisfactions.index', compact('satisfactions'));
    }

    public function create()
    {
        abort_if(Gate::denies('satisfaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.satisfactions.create');
    }

    public function store(StoreSatisfactionRequest $request)
    {
        $satisfaction = Satisfaction::create($request->all());

        return redirect()->route('admin.satisfactions.index');
    }

    public function edit(Satisfaction $satisfaction)
    {
        abort_if(Gate::denies('satisfaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.satisfactions.edit', compact('satisfaction'));
    }

    public function update(UpdateSatisfactionRequest $request, Satisfaction $satisfaction)
    {
        $satisfaction->update($request->all());

        return redirect()->route('admin.satisfactions.index');
    }

    public function show(Satisfaction $satisfaction)
    {
        abort_if(Gate::denies('satisfaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.satisfactions.show', compact('satisfaction'));
    }

    public function destroy(Satisfaction $satisfaction)
    {
        abort_if(Gate::denies('satisfaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $satisfaction->delete();

        return back();
    }

    public function massDestroy(MassDestroySatisfactionRequest $request)
    {
        Satisfaction::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
