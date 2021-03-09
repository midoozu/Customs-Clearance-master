@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.shippingAndClearance.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.shipping-and-clearances.update", [$shippingAndClearance->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label class="required" for="customer_name_id">{{ trans('cruds.shippingAndClearance.fields.customer_name') }}</label>
                    <select class="form-control select2 {{ $errors->has('customer_name') ? 'is-invalid' : '' }}" name="customer_name_id" id="customer_name_id" required>
                        @foreach($customer_names as $id => $customer_name)
                            <option value="{{ $id }}" {{ (old('customer_name_id') ? old('customer_name_id') : $shippingAndClearance->customer_name->id ?? '') == $id ? 'selected' : '' }}>{{ $customer_name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('customer_name'))
                        <span class="text-danger">{{ $errors->first('customer_name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.customer_name_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label  for="int_order_no">{{ trans('cruds.shippingAndClearance.fields.int_order_no') }}</label>
                    <input class="form-control {{ $errors->has('int_order_no') ? 'is-invalid' : '' }}" type="text" name="int_order_no" id="int_order_no" value="{{ old('int_order_no', $shippingAndClearance->int_order_no) }}">
                    @if($errors->has('int_order_no'))
                        <span class="text-danger">{{ $errors->first('int_order_no') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.int_order_no_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label  for="supplier_invoice_number">{{ trans('cruds.shippingAndClearance.fields.supplier_invoice_number') }}</label>
                    <input class="form-control {{ $errors->has('supplier_invoice_number') ? 'is-invalid' : '' }}" type="number" name="supplier_invoice_number" id="supplier_invoice_number" value="{{ old('supplier_invoice_number', $shippingAndClearance->supplier_invoice_number) }}" step="1" required>
                    @if($errors->has('supplier_invoice_number'))
                        <span class="text-danger">{{ $errors->first('supplier_invoice_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.supplier_invoice_number_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label class="required" for="supplier_name">{{ trans('cruds.shippingAndClearance.fields.supplier_name') }}</label>
                    <input class="form-control {{ $errors->has('supplier_name') ? 'is-invalid' : '' }}" type="text" name="supplier_name" id="supplier_name" value="{{ old('supplier_name', $shippingAndClearance->supplier_name) }}" required>
                    @if($errors->has('supplier_name'))
                        <span class="text-danger">{{ $errors->first('supplier_name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.supplier_name_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label  for="shipping_policy_number">{{ trans('cruds.shippingAndClearance.fields.shipping_policy_number') }}</label>
                    <input class="form-control {{ $errors->has('shipping_policy_number') ? 'is-invalid' : '' }}" type="number" name="shipping_policy_number" id="shipping_policy_number" value="{{ old('shipping_policy_number', $shippingAndClearance->shipping_policy_number) }}" step="1" required>
                    @if($errors->has('shipping_policy_number'))
                        <span class="text-danger">{{ $errors->first('shipping_policy_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.shipping_policy_number_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label for="transaction_number">{{ trans('cruds.shippingAndClearance.fields.transaction_number') }}</label>
                    <input class="form-control {{ $errors->has('transaction_number') ? 'is-invalid' : '' }}" type="number" name="transaction_number" id="transaction_number" value="{{ old('transaction_number', $shippingAndClearance->transaction_number) }}" step="1">
                    @if($errors->has('transaction_number'))
                        <span class="text-danger">{{ $errors->first('transaction_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.transaction_number_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label class="required" for="transaction_date">{{ trans('cruds.shippingAndClearance.fields.transaction_date') }}</label>
                    <input class="form-control date {{ $errors->has('transaction_date') ? 'is-invalid' : '' }}" type="text" name="transaction_date" id="transaction_date" value="{{ old('transaction_date', $shippingAndClearance->transaction_date) }}" required>
                    @if($errors->has('transaction_date'))
                        <span class="text-danger">{{ $errors->first('transaction_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.transaction_date_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label class="required" for="arrival_date">{{ trans('cruds.shippingAndClearance.fields.arrival_date') }}</label>
                    <input class="form-control date {{ $errors->has('arrival_date') ? 'is-invalid' : '' }}" type="text" name="arrival_date" id="arrival_date" value="{{ old('arrival_date', $shippingAndClearance->arrival_date) }}" required>
                    @if($errors->has('arrival_date'))
                        <span class="text-danger">{{ $errors->first('arrival_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.arrival_date_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label for="ship_name">{{ trans('cruds.shippingAndClearance.fields.ship_name') }}</label>
                    <input class="form-control {{ $errors->has('ship_name') ? 'is-invalid' : '' }}" type="text" name="ship_name" id="ship_name" value="{{ old('ship_name', $shippingAndClearance->ship_name) }}">
                    @if($errors->has('ship_name'))
                        <span class="text-danger">{{ $errors->first('ship_name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.ship_name_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label class="required" for="discharge_company">{{ trans('cruds.shippingAndClearance.fields.discharge_company') }}</label>
                    <input class="form-control {{ $errors->has('discharge_company') ? 'is-invalid' : '' }}" type="text" name="discharge_company" id="discharge_company" value="{{ old('discharge_company', $shippingAndClearance->discharge_company) }}" required>
                    @if($errors->has('discharge_company'))
                        <span class="text-danger">{{ $errors->first('discharge_company') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.discharge_company_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label for="authorization_delivery_number">{{ trans('cruds.shippingAndClearance.fields.authorization_delivery_number') }}</label>
                    <input class="form-control {{ $errors->has('authorization_delivery_number') ? 'is-invalid' : '' }}" type="number" name="authorization_delivery_number" id="authorization_delivery_number" value="{{ old('authorization_delivery_number', $shippingAndClearance->authorization_delivery_number) }}" step="1">
                    @if($errors->has('authorization_delivery_number'))
                        <span class="text-danger">{{ $errors->first('authorization_delivery_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.authorization_delivery_number_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label class="required" for="authorization_date">{{ trans('cruds.shippingAndClearance.fields.authorization_date') }}</label>
                    <input class="form-control date {{ $errors->has('authorization_date') ? 'is-invalid' : '' }}" type="text" name="authorization_date" id="authorization_date" value="{{ old('authorization_date', $shippingAndClearance->authorization_date) }}" required>
                    @if($errors->has('authorization_date'))
                        <span class="text-danger">{{ $errors->first('authorization_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.authorization_date_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label for="statement_number">{{ trans('cruds.shippingAndClearance.fields.statement_number') }}</label>
                    <input class="form-control {{ $errors->has('statement_number') ? 'is-invalid' : '' }}" type="number" name="statement_number" id="statement_number" value="{{ old('statement_number', $shippingAndClearance->statement_number) }}" step="1">
                    @if($errors->has('statement_number'))
                        <span class="text-danger">{{ $errors->first('statement_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.statement_number_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label for="statement_date">{{ trans('cruds.shippingAndClearance.fields.statement_date') }}</label>
                    <input class="form-control date {{ $errors->has('statement_date') ? 'is-invalid' : '' }}" type="text" name="statement_date" id="statement_date" value="{{ old('statement_date', $shippingAndClearance->statement_date) }}">
                    @if($errors->has('statement_date'))
                        <span class="text-danger">{{ $errors->first('statement_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.statement_date_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label for="shipment_type">{{ trans('cruds.shippingAndClearance.fields.shipment_type') }}</label>
                    <input class="form-control {{ $errors->has('shipment_type') ? 'is-invalid' : '' }}" type="text" name="shipment_type" id="shipment_type" value="{{ old('shipment_type', $shippingAndClearance->shipment_type) }}">
                    @if($errors->has('shipment_type'))
                        <span class="text-danger">{{ $errors->first('shipment_type') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.shipment_type_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label for="container_partial_wight">{{ trans('cruds.shippingAndClearance.fields.container_partial_wight') }}</label>
                    <input class="form-control {{ $errors->has('container_partial_wight') ? 'is-invalid' : '' }}" type="number" name="container_partial_wight" id="container_partial_wight" value="{{ old('container_partial_wight', $shippingAndClearance->container_partial_wight) }}" step="0.01">
                    @if($errors->has('container_partial_wight'))
                        <span class="text-danger">{{ $errors->first('container_partial_wight') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.container_partial_wight_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label for="shipment_fees">{{ trans('cruds.shippingAndClearance.fields.shipment_fees') }}</label>
                    <input class="form-control {{ $errors->has('shipment_fees') ? 'is-invalid' : '' }}" type="number" name="shipment_fees" id="shipment_fees" value="{{ old('shipment_fees', $shippingAndClearance->shipment_fees) }}" step="0.01">
                    @if($errors->has('shipment_fees'))
                        <span class="text-danger">{{ $errors->first('shipment_fees') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.shipment_fees_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label for="policy_replacement_fee">{{ trans('cruds.shippingAndClearance.fields.policy_replacement_fee') }}</label>
                    <input class="form-control {{ $errors->has('policy_replacement_fee') ? 'is-invalid' : '' }}" type="number" name="policy_replacement_fee" id="policy_replacement_fee" value="{{ old('policy_replacement_fee', $shippingAndClearance->policy_replacement_fee) }}" step="0.01">
                    @if($errors->has('policy_replacement_fee'))
                        <span class="text-danger">{{ $errors->first('policy_replacement_fee') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.policy_replacement_fee_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label for="extra_fees">{{ trans('cruds.shippingAndClearance.fields.extra_fees') }}</label>
                    <input class="form-control {{ $errors->has('extra_fees') ? 'is-invalid' : '' }}" type="number" name="extra_fees" id="extra_fees" value="{{ old('extra_fees', $shippingAndClearance->extra_fees) }}" step="0.01">
                    @if($errors->has('extra_fees'))
                        <span class="text-danger">{{ $errors->first('extra_fees') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.extra_fees_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <label for="total_amount">{{ trans('cruds.shippingAndClearance.fields.total_amount') }}</label>
                    <input class="form-control {{ $errors->has('total_amount') ? 'is-invalid' : '' }}" type="number" name="total_amount" id="total_amount" value="{{ old('total_amount', $shippingAndClearance->total_amount) }}" step="0.01">
                    @if($errors->has('total_amount'))
                        <span class="text-danger">{{ $errors->first('total_amount') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.total_amount_helper') }}</span>
                </div>
                <div class="form-group col-md-2 " style="display: inline-block">
                    <button class="btn btn-info" type="submit">
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
