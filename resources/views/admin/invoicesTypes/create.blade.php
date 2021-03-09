@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.invoicesType.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.invoices-types.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="invoice_type">{{ trans('cruds.invoicesType.fields.invoice_type') }}</label>
                    <input class="form-control {{ $errors->has('invoice_type') ? 'is-invalid' : '' }}" type="text" name="invoice_type" id="invoice_type" value="{{ old('invoice_type', '') }}" required>
                    @if($errors->has('invoice_type'))
                        <span class="text-danger">{{ $errors->first('invoice_type') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoicesType.fields.invoice_type_helper') }}</span>
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
