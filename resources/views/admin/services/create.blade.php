@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.service.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.services.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('servicename') ? 'has-error' : '' }}">
                <label for="servicename">{{ trans('cruds.service.fields.name') }}*</label>
                <input type="text" id="servicename" name="servicename" class="form-control" value="{{ old('naservicenameme', isset($service) ? $service->servicename : '') }}" required>
                @if($errors->has('servicename'))
                    <em class="invalid-feedback">
                        {{ $errors->first('servicename') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.service.fields.servicename_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                <label for="amount">{{ trans('cruds.service.fields.amount') }}</label>
                <input type="text" id="amount" name="amount" class="form-control amount" value="{{ old('amount', isset($service) ? $service->amount : '') }}" step="0.01">
                @if($errors->has('amount'))
                    <em class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.service.fields.amount_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('tax_percentage') ? 'has-error' : '' }}">
                <label for="tax_percentage">{{ trans('cruds.service.fields.tax_percentage') }}</label>
                <input type="number" id="tax_percentage" name="tax_percentage" class="form-control" value="{{ old('tax_percentage', isset($service) ? $service->tax_percentage : '') }}" step="0.01">
                @if($errors->has('tax_percentage'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tax_percentage') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.service.fields.tax_percentage_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('tax_amount') ? 'has-error' : '' }}">
                <label for="tax_amount">{{ trans('cruds.service.fields.tax_amount') }}</label>
                <input type="number" id="tax_amount" name="tax_amount" class="form-control" value="{{ old('tax_amount', isset($service) ? $service->tax_amount : '') }}" step="0.01">
                @if($errors->has('tax_amount'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tax_amount') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.service.fields.tax_amount_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('total') ? 'has-error' : '' }}">
                <label for="total">{{ trans('cruds.service.fields.total') }}</label>
                <input type="number" id="total" name="total" class="form-control" value="{{ old('total', isset($service) ? $service->total : '') }}" step="0.01">
                @if($errors->has('total'))
                    <em class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.service.fields.total_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>

        </form>


    </div>
</div>
@endsection

@section('scripts')

    <script>

        $('form').delegate('.amount ,.tax_amount ' ,'keyup' ,function (){



        });
    </script>

@endsection
