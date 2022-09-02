<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMarketingRequest;
use App\Http\Requests\StoreMarketingRequest;
use App\Http\Requests\UpdateMarketingRequest;
use App\Models\Marketing;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MarketingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('marketing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $marketings = Marketing::all();

        return view('admin.marketings.index', compact('marketings'));
    }

    public function create()
    {
        abort_if(Gate::denies('marketing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.marketings.create');
    }

    public function store(StoreMarketingRequest $request)
    {
        $marketing = Marketing::create($request->all());

        return redirect()->route('admin.marketings.index');
    }

    public function edit(Marketing $marketing)
    {
        abort_if(Gate::denies('marketing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.marketings.edit', compact('marketing'));
    }

    public function update(UpdateMarketingRequest $request, Marketing $marketing)
    {
        $marketing->update($request->all());

        return redirect()->route('admin.marketings.index');
    }

    public function show(Marketing $marketing)
    {
        abort_if(Gate::denies('marketing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.marketings.show', compact('marketing'));
    }

    public function destroy(Marketing $marketing)
    {
        abort_if(Gate::denies('marketing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $marketing->delete();

        return back();
    }

    public function massDestroy(MassDestroyMarketingRequest $request)
    {
        Marketing::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
