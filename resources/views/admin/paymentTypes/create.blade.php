@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.paymentType.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.payment-types.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="payment_type">{{ trans('cruds.paymentType.fields.payment_type') }}</label>
                    <input class="form-control {{ $errors->has('payment_type') ? 'is-invalid' : '' }}" type="text" name="payment_type" id="payment_type" value="{{ old('payment_type', '') }}" required>
                    @if($errors->has('payment_type'))
                        <span class="text-danger">{{ $errors->first('payment_type') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.paymentType.fields.payment_type_helper') }}</span>
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
