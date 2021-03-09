@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.carslist.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.carslists.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="car_type">{{ trans('cruds.carslist.fields.car_type') }}</label>
                    <input class="form-control {{ $errors->has('car_type') ? 'is-invalid' : '' }}" type="text" name="car_type" id="car_type" value="{{ old('car_type', '') }}" required>
                    @if($errors->has('car_type'))
                        <span class="text-danger">{{ $errors->first('car_type') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.carslist.fields.car_type_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="car_plate">{{ trans('cruds.carslist.fields.car_plate') }}</label>
                    <input class="form-control {{ $errors->has('car_plate') ? 'is-invalid' : '' }}" type="text" name="car_plate" id="car_plate" value="{{ old('car_plate', '') }}" required>
                    @if($errors->has('car_plate'))
                        <span class="text-danger">{{ $errors->first('car_plate') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.carslist.fields.car_plate_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
                <div class="form-group float-auto" style="display: inline-block">
                    <a class="btn btn-danger" href="{{  url()->previous() }}">
                        {{ trans('global.cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>



@endsection
