@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.companyForm.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.company-forms.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="company_name">{{ trans('cruds.companyForm.fields.company_name') }}</label>
                <input class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" type="text" name="company_name" id="company_name" value="{{ old('company_name', '') }}" required>
                @if($errors->has('company_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.companyForm.fields.company_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="company_location">{{ trans('cruds.companyForm.fields.company_location') }}</label>
                <input class="form-control {{ $errors->has('company_location') ? 'is-invalid' : '' }}" type="text" name="company_location" id="company_location" value="{{ old('company_location', '') }}" required>
                @if($errors->has('company_location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_location') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.companyForm.fields.company_location_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="company_contact">{{ trans('cruds.companyForm.fields.company_contact') }}</label>
                <input class="form-control {{ $errors->has('company_contact') ? 'is-invalid' : '' }}" type="text" name="company_contact" id="company_contact" value="{{ old('company_contact', '') }}" required>
                @if($errors->has('company_contact'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_contact') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.companyForm.fields.company_contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.companyForm.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.companyForm.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.companyForm.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.companyForm.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contact">{{ trans('cruds.companyForm.fields.contact') }}</label>
                <input class="form-control {{ $errors->has('contact') ? 'is-invalid' : '' }}" type="text" name="contact" id="contact" value="{{ old('contact', '') }}" required>
                @if($errors->has('contact'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.companyForm.fields.contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="subject">{{ trans('cruds.companyForm.fields.subject') }}</label>
                <input class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" type="text" name="subject" id="subject" value="{{ old('subject', '') }}" required>
                @if($errors->has('subject'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subject') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.companyForm.fields.subject_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="message">{{ trans('cruds.companyForm.fields.message') }}</label>
                <textarea class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message" required>{{ old('message') }}</textarea>
                @if($errors->has('message'))
                    <div class="invalid-feedback">
                        {{ $errors->first('message') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.companyForm.fields.message_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection