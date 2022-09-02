@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.marketing.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.marketings.update", [$marketing->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="company_name">{{ trans('cruds.marketing.fields.company_name') }}</label>
                <input class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" type="text" name="company_name" id="company_name" value="{{ old('company_name', $marketing->company_name) }}" required>
                @if($errors->has('company_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.marketing.fields.company_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="managing_director">{{ trans('cruds.marketing.fields.managing_director') }}</label>
                <input class="form-control {{ $errors->has('managing_director') ? 'is-invalid' : '' }}" type="text" name="managing_director" id="managing_director" value="{{ old('managing_director', $marketing->managing_director) }}" required>
                @if($errors->has('managing_director'))
                    <div class="invalid-feedback">
                        {{ $errors->first('managing_director') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.marketing.fields.managing_director_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="location">{{ trans('cruds.marketing.fields.location') }}</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', $marketing->location) }}" required>
                @if($errors->has('location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('location') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.marketing.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mobile_number">{{ trans('cruds.marketing.fields.mobile_number') }}</label>
                <input class="form-control {{ $errors->has('mobile_number') ? 'is-invalid' : '' }}" type="text" name="mobile_number" id="mobile_number" value="{{ old('mobile_number', $marketing->mobile_number) }}" required>
                @if($errors->has('mobile_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.marketing.fields.mobile_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="telephone_number">{{ trans('cruds.marketing.fields.telephone_number') }}</label>
                <input class="form-control {{ $errors->has('telephone_number') ? 'is-invalid' : '' }}" type="text" name="telephone_number" id="telephone_number" value="{{ old('telephone_number', $marketing->telephone_number) }}" required>
                @if($errors->has('telephone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telephone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.marketing.fields.telephone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="secondary_cell_number">{{ trans('cruds.marketing.fields.secondary_cell_number') }}</label>
                <input class="form-control {{ $errors->has('secondary_cell_number') ? 'is-invalid' : '' }}" type="text" name="secondary_cell_number" id="secondary_cell_number" value="{{ old('secondary_cell_number', $marketing->secondary_cell_number) }}" required>
                @if($errors->has('secondary_cell_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('secondary_cell_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.marketing.fields.secondary_cell_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comments">{{ trans('cruds.marketing.fields.comments') }}</label>
                <textarea class="form-control {{ $errors->has('comments') ? 'is-invalid' : '' }}" name="comments" id="comments">{{ old('comments', $marketing->comments) }}</textarea>
                @if($errors->has('comments'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comments') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.marketing.fields.comments_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.marketing.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $marketing->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.marketing.fields.email_helper') }}</span>
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