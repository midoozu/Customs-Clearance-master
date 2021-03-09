@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.driverData.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.driver-datas.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.driverData.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.driverData.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="driver_no">{{ trans('cruds.driverData.fields.driver_no') }}</label>
                    <input class="form-control {{ $errors->has('driver_no') ? 'is-invalid' : '' }}" type="number" name="driver_no" id="driver_no" value="{{ old('driver_no', '') }}" step="1" required>
                    @if($errors->has('driver_no'))
                        <span class="text-danger">{{ $errors->first('driver_no') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.driverData.fields.driver_no_helper') }}</span>
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
