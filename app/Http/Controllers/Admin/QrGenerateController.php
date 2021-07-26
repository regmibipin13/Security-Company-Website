<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQrGenerateRequest;
use App\Http\Requests\StoreQrGenerateRequest;
use App\Http\Requests\UpdateQrGenerateRequest;
use App\Models\QrGenerate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class QrGenerateController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('qr_generate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = QrGenerate::query()->select(sprintf('%s.*', (new QrGenerate())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'qr_generate_show';
                $editGate = 'qr_generate_edit';
                $deleteGate = 'qr_generate_delete';
                $crudRoutePart = 'qr-generates';

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
            $table->editColumn('qr_code', function ($row) {
                return $row->qr_code ? $row->qr_code : '';
            });
            $table->editColumn('qr_photo', function ($row) {
                return $row->qr_photo ? $row->qr_photo : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.qrGenerates.index');
    }

    public function create()
    {
        abort_if(Gate::denies('qr_generate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.qrGenerates.create');
    }

    public function store(StoreQrGenerateRequest $request)
    {
        $qrGenerate = QrGenerate::create($request->all());

        return redirect()->route('admin.qr-generates.index');
    }

    public function edit(QrGenerate $qrGenerate)
    {
        abort_if(Gate::denies('qr_generate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.qrGenerates.edit', compact('qrGenerate'));
    }

    public function update(UpdateQrGenerateRequest $request, QrGenerate $qrGenerate)
    {
        $qrGenerate->update($request->all());

        return redirect()->route('admin.qr-generates.index');
    }

    public function show(QrGenerate $qrGenerate)
    {
        abort_if(Gate::denies('qr_generate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.qrGenerates.show', compact('qrGenerate'));
    }

    public function destroy(QrGenerate $qrGenerate)
    {
        abort_if(Gate::denies('qr_generate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qrGenerate->delete();

        return back();
    }

    public function massDestroy(MassDestroyQrGenerateRequest $request)
    {
        QrGenerate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
