@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.invoice.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.invoices.update", [$invoice->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label for="trx_number_id">{{ trans('cruds.invoice.fields.trx_number') }}</label>
                    <select class="form-control select2 {{ $errors->has('trx_number') ? 'is-invalid' : '' }}" name="trx_number_id" id="trx_number_id">
                        @foreach($trx_numbers as $id => $trx_number)
                            <option value="{{ $id }}" {{ (old('trx_number_id') ? old('trx_number_id') : $invoice->trx_number->id ?? '') == $id ? 'selected' : '' }}>{{ $trx_number }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('trx_number'))
                        <span class="text-danger">{{ $errors->first('trx_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoice.fields.trx_number_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label for="inv_date">{{ trans('cruds.invoice.fields.inv_date') }}</label>
                    <input class="form-control date {{ $errors->has('inv_date') ? 'is-invalid' : '' }}" type="text" name="inv_date" id="inv_date" value="{{ old('inv_date', $invoice->inv_date) }}">
                    @if($errors->has('inv_date'))
                        <span class="text-danger">{{ $errors->first('inv_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoice.fields.inv_date_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label for="inv_type_id">{{ trans('cruds.invoice.fields.inv_type') }}</label>
                    <select class="form-control select2 {{ $errors->has('inv_type') ? 'is-invalid' : '' }}" name="inv_type_id" id="inv_type_id">
                        @foreach($inv_types as $id => $inv_type)
                            <option value="{{ $id }}" {{ (old('inv_type_id') ? old('inv_type_id') : $invoice->inv_type->id ?? '') == $id ? 'selected' : '' }}>{{ $inv_type }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('inv_type'))
                        <span class="text-danger">{{ $errors->first('inv_type') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoice.fields.inv_type_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label class="required" for="pay_type_id">{{ trans('cruds.invoice.fields.pay_type') }}</label>
                    <select class="form-control select2 {{ $errors->has('pay_type') ? 'is-invalid' : '' }}" name="pay_type_id" id="pay_type_id" required>
                        @foreach($pay_types as $id => $pay_type)
                            <option value="{{ $id }}" {{ (old('pay_type_id') ? old('pay_type_id') : $invoice->pay_type->id ?? '') == $id ? 'selected' : '' }}>{{ $pay_type }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('pay_type'))
                        <span class="text-danger">{{ $errors->first('pay_type') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoice.fields.pay_type_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label class="required" for="cus_name_id">{{ trans('cruds.invoice.fields.cus_name') }}</label>
                    <select class="form-control select2 {{ $errors->has('cus_name') ? 'is-invalid' : '' }}" name="cus_name_id" id="cus_name_id" required>
                        @foreach($cus_names as $id => $cus_name)
                            <option value="{{ $id }}" {{ (old('cus_name_id') ? old('cus_name_id') : $invoice->cus_name->id ?? '') == $id ? 'selected' : '' }}>{{ $cus_name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('cus_name'))
                        <span class="text-danger">{{ $errors->first('cus_name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoice.fields.cus_name_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label for="ship_name_id">{{ trans('cruds.invoice.fields.ship_name') }}</label>
                    <select class="form-control select2 {{ $errors->has('ship_name') ? 'is-invalid' : '' }}" name="ship_name_id" id="ship_name_id">
                        @foreach($ship_names as $id => $ship_name)
                            <option value="{{ $id }}" {{ (old('ship_name_id') ? old('ship_name_id') : $invoice->ship_name->id ?? '') == $id ? 'selected' : '' }}>{{ $ship_name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('ship_name'))
                        <span class="text-danger">{{ $errors->first('ship_name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoice.fields.ship_name_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label class="required" for="shipped_from">{{ trans('cruds.invoice.fields.shipped_from') }}</label>
                    <input class="form-control {{ $errors->has('shipped_from') ? 'is-invalid' : '' }}" type="text" name="shipped_from" id="shipped_from" value="{{ old('shipped_from', $invoice->shipped_from) }}" required>
                    @if($errors->has('shipped_from'))
                        <span class="text-danger">{{ $errors->first('shipped_from') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoice.fields.shipped_from_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label for="import_statement">{{ trans('cruds.invoice.fields.import_statement') }}</label>
                    <input class="form-control {{ $errors->has('import_statement') ? 'is-invalid' : '' }}" type="text" name="import_statement" id="import_statement" value="{{ old('import_statement', $invoice->import_statement) }}">
                    @if($errors->has('import_statement'))
                        <span class="text-danger">{{ $errors->first('import_statement') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoice.fields.import_statement_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label for="import_statment_date">{{ trans('cruds.invoice.fields.import_statment_date') }}</label>
                    <input class="form-control date {{ $errors->has('import_statment_date') ? 'is-invalid' : '' }}" type="text" name="import_statment_date" id="import_statment_date" value="{{ old('import_statment_date', $invoice->import_statment_date) }}">
                    @if($errors->has('import_statment_date'))
                        <span class="text-danger">{{ $errors->first('import_statment_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoice.fields.import_statment_date_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label class="required" for="no_of_packages">{{ trans('cruds.invoice.fields.no_of_packages') }}</label>
                    <input class="form-control {{ $errors->has('no_of_packages') ? 'is-invalid' : '' }}" type="number" name="no_of_packages" id="no_of_packages" value="{{ old('no_of_packages', $invoice->no_of_packages) }}" step="1" required>
                    @if($errors->has('no_of_packages'))
                        <span class="text-danger">{{ $errors->first('no_of_packages') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoice.fields.no_of_packages_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label for="pay_order_no">{{ trans('cruds.invoice.fields.pay_order_no') }}</label>
                    <input class="form-control {{ $errors->has('pay_order_no') ? 'is-invalid' : '' }}" type="number" name="pay_order_no" id="pay_order_no" value="{{ old('pay_order_no', $invoice->pay_order_no) }}" step="1">
                    @if($errors->has('pay_order_no'))
                        <span class="text-danger">{{ $errors->first('pay_order_no') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoice.fields.pay_order_no_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label for="pay_order_date">{{ trans('cruds.invoice.fields.pay_order_date') }}</label>
                    <input class="form-control date {{ $errors->has('pay_order_date') ? 'is-invalid' : '' }}" type="text" name="pay_order_date" id="pay_order_date" value="{{ old('pay_order_date', $invoice->pay_order_date) }}">
                    @if($errors->has('pay_order_date'))
                        <span class="text-danger">{{ $errors->first('pay_order_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoice.fields.pay_order_date_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <a class="btn btn-danger" href="{{  url()->previous() }}">
                        {{ trans('global.cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>



@endsection
