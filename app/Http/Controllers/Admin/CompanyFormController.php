<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCompanyFormRequest;
use App\Http\Requests\StoreCompanyFormRequest;
use App\Http\Requests\UpdateCompanyFormRequest;
use App\Models\CompanyForm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyFormController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('company_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companyForms = CompanyForm::all();

        return view('admin.companyForms.index', compact('companyForms'));
    }

    public function create()
    {
        abort_if(Gate::denies('company_form_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyForms.create');
    }

    public function store(StoreCompanyFormRequest $request)
    {
        $companyForm = CompanyForm::create($request->all());

        return redirect()->route('admin.company-forms.index');
    }

    public function edit(CompanyForm $companyForm)
    {
        abort_if(Gate::denies('company_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyForms.edit', compact('companyForm'));
    }

    public function update(UpdateCompanyFormRequest $request, CompanyForm $companyForm)
    {
        $companyForm->update($request->all());

        return redirect()->route('admin.company-forms.index');
    }

    public function show(CompanyForm $companyForm)
    {
        abort_if(Gate::denies('company_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyForms.show', compact('companyForm'));
    }

    public function destroy(CompanyForm $companyForm)
    {
        abort_if(Gate::denies('company_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companyForm->delete();

        return back();
    }

    public function massDestroy(MassDestroyCompanyFormRequest $request)
    {
        CompanyForm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
