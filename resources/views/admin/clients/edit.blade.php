@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.client.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.clients.update", [$client->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group col-md-2" style="display: inline-block">
                    <label class="required" for="name">{{ trans('cruds.client.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $client->name) }}" required>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.client.fields.name_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block">
                    <label for="phone">{{ trans('cruds.client.fields.phone') }}</label>
                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="number" name="phone" id="phone" value="{{ old('phone', $client->phone) }}" step="1">
                    @if($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.client.fields.phone_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block">
                    <label class="required" for="acc_number">{{ trans('cruds.client.fields.acc_number') }}</label>
                    <input class="form-control {{ $errors->has('acc_number') ? 'is-invalid' : '' }}" type="number" name="acc_number" id="acc_number" value="{{ old('acc_number', $client->acc_number) }}" step="1" required>
                    @if($errors->has('acc_number'))
                        <span class="text-danger">{{ $errors->first('acc_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.client.fields.acc_number_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block">
                    <label for="city">{{ trans('cruds.client.fields.city') }}</label>
                    <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $client->city) }}">
                    @if($errors->has('city'))
                        <span class="text-danger">{{ $errors->first('city') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.client.fields.city_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block">
                    <label for="address">{{ trans('cruds.client.fields.address') }}</label>
                    <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $client->address) }}">
                    @if($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.client.fields.address_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block">
                    <label for="area">{{ trans('cruds.client.fields.area') }}</label>
                    <input class="form-control {{ $errors->has('area') ? 'is-invalid' : '' }}" type="text" name="area" id="area" value="{{ old('area', $client->area) }}">
                    @if($errors->has('area'))
                        <span class="text-danger">{{ $errors->first('area') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.client.fields.area_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block">
                    <label for="email">{{ trans('cruds.client.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $client->email) }}">
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.client.fields.email_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block">
                    <label>{{ trans('cruds.client.fields.type') }}</label>
                    @foreach(App\Models\Client::TYPE_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('type') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="type_{{ $key }}" name="type" value="{{ $key }}" {{ old('type', $client->type) === (string) $key ? 'checked' : '' }}>
                            <label class="form-check-label" for="type_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if($errors->has('type'))
                        <span class="text-danger">{{ $errors->first('type') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.client.fields.type_helper') }}</span>
                </div>
                <br>
                <div class="form-group float-right col-md-2" style="display: inline-block">
                    <button class="btn btn-info" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
                <div class="form-group float-left col-md-2" style="display: inline-block">
                    <a class="btn btn-danger" href="{{  url()->previous() }}">
                        {{ trans('global.cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>



@endsection
