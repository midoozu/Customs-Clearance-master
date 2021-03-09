@extends('layouts.admin')
@section('content')

    <div class="card" xmlns="http://www.w3.org/1999/html">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.invoiceTranslate.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.invoice-translates.store") }}" enctype="multipart/form-data">
                @csrf




                <div class="form-row col-2" style="display: inline-block">
                    <label class="required"
                           for="receipt_voucher_id">{{ trans('cruds.invoiceTranslate.fields.receipt_voucher') }}</label>
                    <select class="form-control select2 {{ $errors->has('receipt_voucher') ? 'is-invalid' : '' }}"
                            name="receipt_voucher_id" id="receipt_voucher_id" required>
                        @foreach($receipt_vouchers as $id => $receipt_voucher)
                            <option
                                value="{{ $id }}" {{ old('receipt_voucher_id') == $id ? 'selected' : '' }}>{{ $receipt_voucher }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('receipt_voucher'))
                        <span class="text-danger">{{ $errors->first('receipt_voucher') }}</span>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.invoiceTranslate.fields.receipt_voucher_helper') }}</span>
                </div>


                <div class="form-group" style="display: inline-block">
                    <label class="required" for="currency">{{ trans('cruds.invoiceTranslate.fields.currency') }}</label>
                    <input class="form-control {{ $errors->has('currency') ? 'is-invalid' : '' }}" type="text" name="currency" id="currency" value="{{ old('currency', '') }}" required>
                    @if($errors->has('currency'))
                        <span class="text-danger">{{ $errors->first('currency') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.currency_helper') }}</span>
                </div>

                <div class="form-group" style="display: inline-block">
                    <label class="required" for="invoice_number">{{ trans('cruds.invoiceTranslate.fields.invoice_number') }}</label>
                    <input class="form-control {{ $errors->has('invoice_number') ? 'is-invalid' : '' }}" type="number" name="invoice_number" id="invoice_number" value="{{ old('invoice_number', '') }}" step="1" required>
                    @if($errors->has('invoice_number'))
                        <span class="text-danger">{{ $errors->first('invoice_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.invoice_number_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label class="required" for="invoice_date">{{ trans('cruds.invoiceTranslate.fields.invoice_date') }}</label>
                    <input class="form-control date {{ $errors->has('invoice_date') ? 'is-invalid' : '' }}" type="text" name="invoice_date" id="invoice_date" value="{{ old('invoice_date') }}" required>
                    @if($errors->has('invoice_date'))
                        <span class="text-danger">{{ $errors->first('invoice_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.invoice_date_helper') }}</span>
                </div>
                <div class="form-group col-md-2" style="display: inline-block">
                    <label class="required" for="invoice_type">{{ trans('cruds.invoiceTranslate.fields.invoice_type') }}</label>
                    <select class="form-control select2 {{ $errors->has('invoice_type') ? 'is-invalid' : '' }}" name="invoice_type" id="invoice_type" required>
                        <option value="IF">{{'IF'}}</option>
                        <option value="EXW">{{'EXW'}}</option>
                        <option value="C&F">{{'C&F'}}</option>
                        <option value="FOB">{{'FOB'}}</option>
                    </select>
                    @if($errors->has('invoice_type'))
                        <span class="text-danger">{{ $errors->first('invoice_type') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.invoice_type_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label class="required" for="saber_number">{{ trans('cruds.invoiceTranslate.fields.saber_number') }}</label>
                    <input class="form-control {{ $errors->has('saber_number') ? 'is-invalid' : '' }}" type="number" name="saber_number" id="saber_number" value="{{ old('saber_number', '') }}" step="1" required>
                    @if($errors->has('saber_number'))
                        <span class="text-danger">{{ $errors->first('saber_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.saber_number_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label class="required" for="exemption_number">{{ trans('cruds.invoiceTranslate.fields.exemption_number') }}</label>
                    <input class="form-control {{ $errors->has('exemption_number') ? 'is-invalid' : '' }}" type="number" name="exemption_number" id="exemption_number" value="{{ old('exemption_number', '') }}" step="1" required>
                    @if($errors->has('exemption_number'))
                        <span class="text-danger">{{ $errors->first('exemption_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.exemption_number_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label  for="shipment_fee">{{ trans('cruds.invoiceTranslate.fields.shipment_fee') }}</label>
                    <input class="form-control {{ $errors->has('shipment_fee') ? 'is-invalid' : '' }}" type="number" name="shipment_fee" id="shipment_fee" value="{{ old('shipment_fee', '') }}" step="0.01" >
                    @if($errors->has('shipment_fee'))
                        <span class="text-danger">{{ $errors->first('shipment_fee') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoiceTranslate.fields.shipment_fee_helper') }}</span>
                </div>
                <br>

<div>

    <table class="table table-bordered ">
        <thead>
        <tr>
            <th > {{ trans('cruds.invoiceTranslate.fields.arabic_desc') }}</th>
            <th > {{ trans('cruds.invoiceTranslate.fields.en_desc') }}</th>
            <th > {{ trans('cruds.invoiceTranslate.fields.quantity') }}</th>
            <th > {{ trans('cruds.invoiceTranslate.fields.unit') }}</th>
            <th > {{ trans('cruds.invoiceTranslate.fields.hscode') }}</th>
            <th > {{ trans('cruds.invoiceTranslate.fields.amount') }}</th>
            <th > {{ trans('cruds.invoiceTranslate.fields.manufacturing_country') }}</th>

            <th><a id="addRow" href="#" class="btn btn-info addRow " >+</a></th>
        </tr>
        </thead>
        <tbody>
        <tr>
<td><input class="form-control " type="text" name="arabic_desc[]" id="arabic_desc"  required></td>
<td><input class="form-control {{ $errors->has('en_desc') ? 'is-invalid' : '' }}" type="text" name="en_desc[]" id="en_desc" required></td>
<td><input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity[]" id="quantity"  step="1" required></td>
<td><input class="form-control {{ $errors->has('unit') ? 'is-invalid' : '' }}" type="number" name="unit[]" id="unit" step="1" required> </td>
<td><input class="form-control {{ $errors->has('hscode') ? 'is-invalid' : '' }}" type="number" name="hscode[]" id="hscode" pattern="[0-9]{12}"   required></td>
 <td><input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount[]" id="amount"  required></td>
<td><input class="form-control {{ $errors->has('manufacturing_country') ? 'is-invalid' : '' }}" type="text" name="manufacturing_country" id="manufacturing_country"  required></td>




      <td><a href="#" class="btn btn-danger remove">-</a></td>
        </tr>
        </tbody>
    </table>
</div>
                <div class="form-group float-right" >
                    <button class="btn btn-info" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
                <div class="form-group float-left" >
                    <a class="btn btn-danger" href="{{  url()->previous() }}">
                        {{ trans('global.cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script>

        $('.addRow').on('click', function (e) {
            e.preventDefault();
            addRow();
        });

        function addRow() {
            var tr = `  <tr>
<td><input class="form-control " type="text" name="arabic_desc[]" id="arabic_desc"  required></td>
<td><input class="form-control {{ $errors->has('en_desc') ? 'is-invalid' : '' }}" type="text" name="en_desc[]" id="en_desc" required></td>
<td><input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity[]" id="quantity"  step="1" required></td>
<td><input class="form-control {{ $errors->has('unit') ? 'is-invalid' : '' }}" type="number" name="unit[]" id="unit" step="1" required> </td>
<td><input class="form-control {{ $errors->has('hscode') ? 'is-invalid' : '' }}" type="number" name="hscode[]" id="hscode" pattern="[0-9]{12}"   required></td>
 <td><input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount[]" id="amount"  required></td>
<td><input class="form-control {{ $errors->has('manufacturing_country') ? 'is-invalid' : '' }}" type="text" name="manufacturing_country" id="manufacturing_country"  required></td>




      <td><a href="#" class="btn btn-danger remove">-</a></td>
        </tr>`;
            $('tbody').append(tr);

        };


        $('tbody').on('click', '.remove', function () {
            $(this).parent().parent().remove();
        });
    </script>


@endsection
