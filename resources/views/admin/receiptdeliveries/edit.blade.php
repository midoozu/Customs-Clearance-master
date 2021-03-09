@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.receiptdelivery.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.receiptdeliveries.update", [$receiptdelivery->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label class="required" for="cus_name">{{ trans('cruds.receiptdelivery.fields.cus_name') }}</label>
                    <input class="form-control {{ $errors->has('cus_name') ? 'is-invalid' : '' }}" type="text" name="cus_name" id="cus_name" value="{{ old('cus_name', $receiptdelivery->cus_name) }}" required>
                    @if($errors->has('cus_name'))
                        <span class="text-danger">{{ $errors->first('cus_name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptdelivery.fields.cus_name_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label class="required" for="cus_acc_number">{{ trans('cruds.receiptdelivery.fields.cus_acc_number') }}</label>
                    <input class="form-control {{ $errors->has('cus_acc_number') ? 'is-invalid' : '' }}" type="number" name="cus_acc_number" id="cus_acc_number" value="{{ old('cus_acc_number', $receiptdelivery->cus_acc_number) }}" step="1" required>
                    @if($errors->has('cus_acc_number'))
                        <span class="text-danger">{{ $errors->first('cus_acc_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptdelivery.fields.cus_acc_number_helper') }}</span>
                </div>

                <div class="form-group col-md-2 " style="display: inline-block">
                    <label class="required" for="file_number">{{ trans('cruds.receiptdelivery.fields.file_number') }}</label>
                    <input class="form-control {{ $errors->has('file_number') ? 'is-invalid' : '' }}" type="number" name="file_number" id="file_number" value="{{ old('file_number', $receiptdelivery->file_number) }}" step="1" required>
                    @if($errors->has('file_number'))
                        <span class="text-danger">{{ $errors->first('file_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptdelivery.fields.file_number_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label class="required" for="p_p_no">{{ trans('cruds.receiptdelivery.fields.p_p_no') }}</label>
                    <input class="form-control {{ $errors->has('p_p_no') ? 'is-invalid' : '' }}" type="number" name="p_p_no" id="p_p_no" value="{{ old('p_p_no', $receiptdelivery->p_p_no) }}" step="1" required>
                    @if($errors->has('p_p_no'))
                        <span class="text-danger">{{ $errors->first('p_p_no') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptdelivery.fields.p_p_no_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label class="required" for="eta_date">{{ trans('cruds.receiptdelivery.fields.eta_date') }}</label>
                    <input class="form-control date {{ $errors->has('eta_date') ? 'is-invalid' : '' }}" type="text" name="eta_date" id="eta_date" value="{{ old('eta_date', $receiptdelivery->eta_date) }}" required>
                    @if($errors->has('eta_date'))
                        <span class="text-danger">{{ $errors->first('eta_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptdelivery.fields.eta_date_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label class="required" for="policy_no">{{ trans('cruds.receiptdelivery.fields.policy_no') }}</label>
                    <input class="form-control {{ $errors->has('policy_no') ? 'is-invalid' : '' }}" type="number" name="policy_no" id="policy_no" value="{{ old('policy_no', $receiptdelivery->policy_no) }}" step="1" required>
                    @if($errors->has('policy_no'))
                        <span class="text-danger">{{ $errors->first('policy_no') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptdelivery.fields.policy_no_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label class="required" for="ship_name">{{ trans('cruds.receiptdelivery.fields.ship_name') }}</label>
                    <input class="form-control {{ $errors->has('ship_name') ? 'is-invalid' : '' }}" type="text" name="ship_name" id="ship_name" value="{{ old('ship_name', $receiptdelivery->ship_name) }}" required>
                    @if($errors->has('ship_name'))
                        <span class="text-danger">{{ $errors->first('ship_name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptdelivery.fields.ship_name_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label class="required" for="driver_name_id">{{ trans('cruds.receiptdelivery.fields.driver_name') }}</label>
                    <select class="form-control select2 {{ $errors->has('driver_name') ? 'is-invalid' : '' }}" name="driver_name_id" id="driver_name_id" required>
                        @foreach($driver_names as $id => $driver_name)
                            <option value="{{ $id }}" {{ (old('driver_name_id') ? old('driver_name_id') : $receiptdelivery->driver_name->id ?? '') == $id ? 'selected' : '' }}>{{ $driver_name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('driver_name'))
                        <span class="text-danger">{{ $errors->first('driver_name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptdelivery.fields.driver_name_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label for="car_plate_id">{{ trans('cruds.receiptdelivery.fields.car_plate') }}</label>
                    <select class="form-control select2 {{ $errors->has('car_plate') ? 'is-invalid' : '' }}" name="car_plate_id" id="car_plate_id">
                        @foreach($car_plates as $id => $car_plate)
                            <option value="{{ $id }}" {{ (old('car_plate_id') ? old('car_plate_id') : $receiptdelivery->car_plate->id ?? '') == $id ? 'selected' : '' }}>{{ $car_plate }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('car_plate'))
                        <span class="text-danger">{{ $errors->first('car_plate') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptdelivery.fields.car_plate_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label class="required" for="leave_date">{{ trans('cruds.receiptdelivery.fields.leave_date') }}</label>
                    <input class="form-control date {{ $errors->has('leave_date') ? 'is-invalid' : '' }}" type="text" name="leave_date" id="leave_date" value="{{ old('leave_date', $receiptdelivery->leave_date) }}" required>
                    @if($errors->has('leave_date'))
                        <span class="text-danger">{{ $errors->first('leave_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptdelivery.fields.leave_date_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label>{{ trans('cruds.receiptdelivery.fields.status') }}</label>
                    <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                        <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Receiptdelivery::STATUS_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('status', $receiptdelivery->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('status'))
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptdelivery.fields.status_helper') }}</span>
                </div>

                <div class="form-group col-md-2 " style="display: inline-block">
                    <label class="required" for="recipient">{{ trans('cruds.receiptdelivery.fields.recipient') }}</label>
                    <input class="form-control {{ $errors->has('recipient') ? 'is-invalid' : '' }}" type="text" name="recipient" id="recipient" value="{{ old('recipient', $receiptdelivery->recipient) }}" required>
                    @if($errors->has('recipient'))
                        <span class="text-danger">{{ $errors->first('recipient') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptdelivery.fields.recipient_helper') }}</span>
                </div>

                <div class="form-group col-md-2 " style="display: inline-block">
                    <label class="required" for="contact">{{ trans('cruds.receiptdelivery.fields.contact') }}</label>
                    <input class="form-control {{ $errors->has('contact') ? 'is-invalid' : '' }}" type="number" name="contact" id="contact" value="{{ old('contact', $receiptdelivery->contact) }}" step="1" required>
                    @if($errors->has('contact'))
                        <span class="text-danger">{{ $errors->first('contact') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptdelivery.fields.contact_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label for="sec_contact">{{ trans('cruds.receiptdelivery.fields.sec_contact') }}</label>
                    <input class="form-control {{ $errors->has('sec_contact') ? 'is-invalid' : '' }}" type="number" name="sec_contact" id="sec_contact" value="{{ old('sec_contact', $receiptdelivery->sec_contact) }}" step="1">
                    @if($errors->has('sec_contact'))
                        <span class="text-danger">{{ $errors->first('sec_contact') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptdelivery.fields.sec_contact_helper') }}</span>
                </div>
                <div class="form-group ">
                    <label class="required" for="recipient_address">{{ trans('cruds.receiptdelivery.fields.recipient_address') }}</label>
                    <textarea class="form-control {{ $errors->has('recipient_address') ? 'is-invalid' : '' }}" name="recipient_address" id="recipient_address" required>{{ old('recipient_address', $receiptdelivery->recipient_address) }}</textarea>
                    @if($errors->has('recipient_address'))
                        <span class="text-danger">{{ $errors->first('recipient_address') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptdelivery.fields.recipient_address_helper') }}</span>
                </div>

                <div class="form-group col-md-2 " style="display: inline-block">
                    <button class="btn btn-info" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block"  >
                    <a class="btn btn-danger" href="{{  url()->previous() }}">
                        {{ trans('global.cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>



@endsection
