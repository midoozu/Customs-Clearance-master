@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.invoiceTranslate.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.invoice-translates.update", [$invoiceTranslate->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label class="required" for="arabic_desc">{{ trans('cruds.invoiceTranslate.fields.arabic_desc') }}</label>
                    <input class="form-control {{ $errors->has('arabic_desc') ? 'is-invalid' : '' }}" type="text" name="arabic_desc" id="arabic_desc" value="{{ old('arabic_desc', $invoiceTranslate->arabic_desc) }}" required>
                    @if($errors->has('arabic_desc'))
                        <span class="text-danger">{{ $errors->first('arabic_desc') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.arabic_desc_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label class="required" for="en_desc">{{ trans('cruds.invoiceTranslate.fields.en_desc') }}</label>
                    <input class="form-control {{ $errors->has('en_desc') ? 'is-invalid' : '' }}" type="text" name="en_desc" id="en_desc" value="{{ old('en_desc', $invoiceTranslate->en_desc) }}" required>
                    @if($errors->has('en_desc'))
                        <span class="text-danger">{{ $errors->first('en_desc') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.en_desc_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label class="required" for="customs_item">{{ trans('cruds.invoiceTranslate.fields.customs_item') }}</label>
                    <input class="form-control {{ $errors->has('customs_item') ? 'is-invalid' : '' }}" type="text" name="customs_item" id="customs_item" value="{{ old('customs_item', $invoiceTranslate->customs_item) }}" required>
                    @if($errors->has('customs_item'))
                        <span class="text-danger">{{ $errors->first('customs_item') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.customs_item_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label class="required" for="currency">{{ trans('cruds.invoiceTranslate.fields.currency') }}</label>
                    <input class="form-control {{ $errors->has('currency') ? 'is-invalid' : '' }}" type="text" name="currency" id="currency" value="{{ old('currency', $invoiceTranslate->currency) }}" required>
                    @if($errors->has('currency'))
                        <span class="text-danger">{{ $errors->first('currency') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.currency_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label class="required" for="quantity">{{ trans('cruds.invoiceTranslate.fields.quantity') }}</label>
                    <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $invoiceTranslate->quantity) }}" step="1" required>
                    @if($errors->has('quantity'))
                        <span class="text-danger">{{ $errors->first('quantity') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.quantity_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label class="required" for="manufacturing_country">{{ trans('cruds.invoiceTranslate.fields.manufacturing_country') }}</label>
                    <input class="form-control {{ $errors->has('manufacturing_country') ? 'is-invalid' : '' }}" type="text" name="manufacturing_country" id="manufacturing_country" value="{{ old('manufacturing_country', $invoiceTranslate->manufacturing_country) }}" required>
                    @if($errors->has('manufacturing_country'))
                        <span class="text-danger">{{ $errors->first('manufacturing_country') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.manufacturing_country_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label class="required" for="transaction_number">{{ trans('cruds.invoiceTranslate.fields.transaction_number') }}</label>
                    <input class="form-control {{ $errors->has('transaction_number') ? 'is-invalid' : '' }}" type="number" name="transaction_number" id="transaction_number" value="{{ old('transaction_number', $invoiceTranslate->transaction_number) }}" step="1" required>
                    @if($errors->has('transaction_number'))
                        <span class="text-danger">{{ $errors->first('transaction_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.transaction_number_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label class="required" for="invoice_number">{{ trans('cruds.invoiceTranslate.fields.invoice_number') }}</label>
                    <input class="form-control {{ $errors->has('invoice_number') ? 'is-invalid' : '' }}" type="number" name="invoice_number" id="invoice_number" value="{{ old('invoice_number', $invoiceTranslate->invoice_number) }}" step="1" required>
                    @if($errors->has('invoice_number'))
                        <span class="text-danger">{{ $errors->first('invoice_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.invoice_number_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label class="required" for="invoice_date">{{ trans('cruds.invoiceTranslate.fields.invoice_date') }}</label>
                    <input class="form-control date {{ $errors->has('invoice_date') ? 'is-invalid' : '' }}" type="text" name="invoice_date" id="invoice_date" value="{{ old('invoice_date', $invoiceTranslate->invoice_date) }}" required>
                    @if($errors->has('invoice_date'))
                        <span class="text-danger">{{ $errors->first('invoice_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.invoice_date_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label class="required" for="invoice_type_id">{{ trans('cruds.invoiceTranslate.fields.invoice_type') }}</label>
                    <select class="form-control select2 {{ $errors->has('invoice_type') ? 'is-invalid' : '' }}" name="invoice_type_id" id="invoice_type_id" required>
                        @foreach($invoice_types as $id => $invoice_type)
                            <option value="{{ $id }}" {{ (old('invoice_type_id') ? old('invoice_type_id') : $invoiceTranslate->invoice_type->id ?? '') == $id ? 'selected' : '' }}>{{ $invoice_type }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('invoice_type'))
                        <span class="text-danger">{{ $errors->first('invoice_type') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.invoice_type_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label class="required" for="saber_number">{{ trans('cruds.invoiceTranslate.fields.saber_number') }}</label>
                    <input class="form-control {{ $errors->has('saber_number') ? 'is-invalid' : '' }}" type="number" name="saber_number" id="saber_number" value="{{ old('saber_number', $invoiceTranslate->saber_number) }}" step="1" required>
                    @if($errors->has('saber_number'))
                        <span class="text-danger">{{ $errors->first('saber_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.saber_number_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label class="required" for="exemption_number">{{ trans('cruds.invoiceTranslate.fields.exemption_number') }}</label>
                    <input class="form-control {{ $errors->has('exemption_number') ? 'is-invalid' : '' }}" type="number" name="exemption_number" id="exemption_number" value="{{ old('exemption_number', $invoiceTranslate->exemption_number) }}" step="1" required>
                    @if($errors->has('exemption_number'))
                        <span class="text-danger">{{ $errors->first('exemption_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.exemption_number_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <label class="required" for="shipment_fee">{{ trans('cruds.invoiceTranslate.fields.shipment_fee') }}</label>
                    <input class="form-control {{ $errors->has('shipment_fee') ? 'is-invalid' : '' }}" type="number" name="shipment_fee" id="shipment_fee" value="{{ old('shipment_fee', $invoiceTranslate->shipment_fee) }}" step="0.01" required>
                    @if($errors->has('shipment_fee'))
                        <span class="text-danger">{{ $errors->first('shipment_fee') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.shipment_fee_helper') }}</span>
                </div>

                <br>
                <div class="form-group col-md-2" style="display: inline-block" >
                    <button class="btn btn-info" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
                <div class="form-group col-md-2" style="display: inline-block">
                    <a class="btn btn-danger" href="{{  url()->previous() }}">
                        {{ trans('global.cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>



@endsection
