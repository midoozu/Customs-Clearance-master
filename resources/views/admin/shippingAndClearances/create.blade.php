@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.shippingAndClearance.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.shipping-and-clearances.store") }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-row col-2" style="display: inline-block">
                    <label class="required"
                           for="customer_name_id">{{ trans('cruds.shippingAndClearance.fields.customer_name') }}</label>
                    <select class="form-control select2 {{ $errors->has('customer_name') ? 'is-invalid' : '' }}"
                            name="customer_name_id" id="customer_name_id" required>
                        @foreach($customer_names as $id => $customer_name)
                            <option
                                value="{{ $id }}" {{ old('customer_name_id') == $id ? 'selected' : '' }}>{{ $customer_name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('customer_name'))
                        <span class="text-danger">{{ $errors->first('customer_name') }}</span>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.shippingAndClearance.fields.customer_name_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label
                           for="int_order_no">{{ trans('cruds.shippingAndClearance.fields.int_order_no') }}</label>
                    <input class="form-control {{ $errors->has('int_order_no') ? 'is-invalid' : '' }}" type="text"
                           name="int_order_no" id="int_order_no" value="{{ old('int_order_no', '') }}">
                    @if($errors->has('int_order_no'))
                        <span class="text-danger">{{ $errors->first('int_order_no') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.int_order_no_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label
                           for="supplier_invoice_number">{{ trans('cruds.shippingAndClearance.fields.supplier_invoice_number') }}</label>
                    <input class="form-control {{ $errors->has('supplier_invoice_number') ? 'is-invalid' : '' }}"
                           type="text" name="supplier_invoice_number" id="supplier_invoice_number"
                           value="{{ old('supplier_invoice_number', '') }}" >
                    @if($errors->has('supplier_invoice_number'))
                        <span class="text-danger">{{ $errors->first('supplier_invoice_number') }}</span>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.shippingAndClearance.fields.supplier_invoice_number_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label class="required"
                           for="supplier_name">{{ trans('cruds.shippingAndClearance.fields.supplier_name') }}</label>
                    <input class="form-control {{ $errors->has('supplier_name') ? 'is-invalid' : '' }}" type="text"
                           name="supplier_name" id="supplier_name" value="{{ old('supplier_name', '') }}" required>
                    @if($errors->has('supplier_name'))
                        <span class="text-danger">{{ $errors->first('supplier_name') }}</span>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.shippingAndClearance.fields.supplier_name_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label
                           for="shipping_policy_number">{{ trans('cruds.shippingAndClearance.fields.shipping_policy_number') }}</label>
                    <input class="form-control {{ $errors->has('shipping_policy_number') ? 'is-invalid' : '' }}"
                           type="text" name="shipping_policy_number" id="shipping_policy_number"
                           value="{{ old('shipping_policy_number', '') }}">
                    @if($errors->has('shipping_policy_number'))
                        <span class="text-danger">{{ $errors->first('shipping_policy_number') }}</span>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.shippingAndClearance.fields.shipping_policy_number_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label
                        for="transaction_number">{{ trans('cruds.shippingAndClearance.fields.transaction_number') }}</label>
                    <input class="form-control {{ $errors->has('transaction_number') ? 'is-invalid' : '' }}"
                           type="number" name="transaction_number" id="transaction_number"
                           value="{{ old('transaction_number', '') }}" step="1">
                    @if($errors->has('transaction_number'))
                        <span class="text-danger">{{ $errors->first('transaction_number') }}</span>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.shippingAndClearance.fields.transaction_number_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label class="required"
                           for="transaction_date">{{ trans('cruds.shippingAndClearance.fields.transaction_date') }}</label>
                    <input class="form-control date {{ $errors->has('transaction_date') ? 'is-invalid' : '' }}"
                           type="text" name="transaction_date" id="transaction_date"
                           value="{{ old('transaction_date') }}" required>
                    @if($errors->has('transaction_date'))
                        <span class="text-danger">{{ $errors->first('transaction_date') }}</span>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.shippingAndClearance.fields.transaction_date_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label class="required"
                           for="arrival_date">{{ trans('cruds.shippingAndClearance.fields.arrival_date') }}</label>
                    <input class="form-control date {{ $errors->has('arrival_date') ? 'is-invalid' : '' }}" type="text"
                           name="arrival_date" id="arrival_date" value="{{ old('arrival_date') }}" required>
                    @if($errors->has('arrival_date'))
                        <span class="text-danger">{{ $errors->first('arrival_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.arrival_date_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label for="ship_name">{{ trans('cruds.shippingAndClearance.fields.ship_name') }}</label>
                    <input class="form-control {{ $errors->has('ship_name') ? 'is-invalid' : '' }}" type="text"
                           name="ship_name" id="ship_name" value="{{ old('ship_name', '') }}">
                    @if($errors->has('ship_name'))
                        <span class="text-danger">{{ $errors->first('ship_name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.ship_name_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label class="required"
                           for="discharge_company">{{ trans('cruds.shippingAndClearance.fields.discharge_company') }}</label>
                    <input class="form-control {{ $errors->has('discharge_company') ? 'is-invalid' : '' }}" type="text"
                           name="discharge_company" id="discharge_company" value="{{ old('discharge_company', '') }}"
                           required>
                    @if($errors->has('discharge_company'))
                        <span class="text-danger">{{ $errors->first('discharge_company') }}</span>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.shippingAndClearance.fields.discharge_company_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label
                        for="authorization_delivery_number">{{ trans('cruds.shippingAndClearance.fields.authorization_delivery_number') }}</label>
                    <input class="form-control {{ $errors->has('authorization_delivery_number') ? 'is-invalid' : '' }}"
                           type="number" name="authorization_delivery_number" id="authorization_delivery_number"
                           value="{{ old('authorization_delivery_number', '') }}" step="1">
                    @if($errors->has('authorization_delivery_number'))
                        <span class="text-danger">{{ $errors->first('authorization_delivery_number') }}</span>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.shippingAndClearance.fields.authorization_delivery_number_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label class="required"
                           for="authorization_date">{{ trans('cruds.shippingAndClearance.fields.authorization_date') }}</label>
                    <input class="form-control date {{ $errors->has('authorization_date') ? 'is-invalid' : '' }}"
                           type="text" name="authorization_date" id="authorization_date"
                           value="{{ old('authorization_date') }}" required>
                    @if($errors->has('authorization_date'))
                        <span class="text-danger">{{ $errors->first('authorization_date') }}</span>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.shippingAndClearance.fields.authorization_date_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label
                        for="statement_number">{{ trans('cruds.shippingAndClearance.fields.statement_number') }}</label>
                    <input class="form-control {{ $errors->has('statement_number') ? 'is-invalid' : '' }}" type="number"
                           name="statement_number" id="statement_number" value="{{ old('statement_number', '') }}"
                           step="1">
                    @if($errors->has('statement_number'))
                        <span class="text-danger">{{ $errors->first('statement_number') }}</span>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.shippingAndClearance.fields.statement_number_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label for="statement_date">{{ trans('cruds.shippingAndClearance.fields.statement_date') }}</label>
                    <input class="form-control date {{ $errors->has('statement_date') ? 'is-invalid' : '' }}"
                           type="text" name="statement_date" id="statement_date" value="{{ old('statement_date') }}">
                    @if($errors->has('statement_date'))
                        <span class="text-danger">{{ $errors->first('statement_date') }}</span>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.shippingAndClearance.fields.statement_date_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label for="shipment_type">{{ trans('cruds.shippingAndClearance.fields.shipment_type') }}</label>
                    <input class="form-control {{ $errors->has('shipment_type') ? 'is-invalid' : '' }}" type="text"
                           name="shipment_type" id="shipment_type" value="{{ old('shipment_type', '') }}">
                    @if($errors->has('shipment_type'))
                        <span class="text-danger">{{ $errors->first('shipment_type') }}</span>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.shippingAndClearance.fields.shipment_type_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label
                        for="container_partial_wight">{{ trans('cruds.shippingAndClearance.fields.container_partial_wight') }}</label>
                    <input class="form-control {{ $errors->has('container_partial_wight') ? 'is-invalid' : '' }}"
                           type="number" name="container_partial_wight" id="container_partial_wight"
                           value="{{ old('container_partial_wight', '') }}" step="0.01">
                    @if($errors->has('container_partial_wight'))
                        <span class="text-danger">{{ $errors->first('container_partial_wight') }}</span>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.shippingAndClearance.fields.container_partial_wight_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label class="required"
                           for="trx_status_id">{{ trans('cruds.shippingAndClearance.fields.trx_status') }}</label>
                    <select class="form-control select2 {{ $errors->has('trx_status') ? 'is-invalid' : '' }}"
                            name="trx_status_id" id="trx_status_id" required>
                        @foreach($trx_statuses as $id => $trx_status)
                            <option
                                value="{{ $id }}" {{ old('trx_status_id') == $id ? 'selected' : '' }}>{{ $trx_status }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('trx_status'))
                        <span class="text-danger">{{ $errors->first('trx_status') }}</span>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.shippingAndClearance.fields.trx_status_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label for="shipment_fees">{{ trans('cruds.shippingAndClearance.fields.shipment_fees') }}</label>
                    <input class="form-control {{ $errors->has('shipment_fees') ? 'is-invalid' : '' }}" type="number"
                           name="shipment_fees" id="shipment_fees" value="{{ old('shipment_fees', '') }}" step="0.01">
                    @if($errors->has('shipment_fees'))
                        <span class="text-danger">{{ $errors->first('shipment_fees') }}</span>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.shippingAndClearance.fields.shipment_fees_helper') }}</span>
                </div>


                <div class="form-row col-2" style="display: inline-block">
                    <label
                        for="policy_replacement_fee">{{ trans('cruds.shippingAndClearance.fields.policy_replacement_fee') }}</label>
                    <input class="form-control {{ $errors->has('policy_replacement_fee') ? 'is-invalid' : '' }}"
                           type="number" name="policy_replacement_fee" id="policy_replacement_fee"
                           value="{{ old('policy_replacement_fee', '') }}" step="0.01">
                    @if($errors->has('policy_replacement_fee'))
                        <span class="text-danger">{{ $errors->first('policy_replacement_fee') }}</span>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.shippingAndClearance.fields.policy_replacement_fee_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label for="extra_fees">{{ trans('cruds.shippingAndClearance.fields.extra_fees') }}</label>
                    <input class="form-control {{ $errors->has('extra_fees') ? 'is-invalid' : '' }}" type="number"
                           name="extra_fees" id="extra_fees" value="{{ old('extra_fees', '') }}" step="0.01">
                    @if($errors->has('extra_fees'))
                        <span class="text-danger">{{ $errors->first('extra_fees') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.extra_fees_helper') }}</span>
                </div>
                <div class="form-row col-2" style="display: inline-block">
                    <label for="total_amount">{{ trans('cruds.shippingAndClearance.fields.total_amount') }}</label>
                    <input class="form-control {{ $errors->has('total_amount') ? 'is-invalid' : '' }}" type="number"
                           name="total_amount" id="total_amount" value="{{ old('total_amount', '') }}"  readonly >
                    @if($errors->has('total_amount'))
                        <span class="text-danger">{{ $errors->first('total_amount') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.shippingAndClearance.fields.total_amount_helper') }}</span>
                </div>



                    <div class="card-header">
                        {{ trans('cruds.shippingAndClearance.fields.car_plate_number') }}
                    </div>

                            <table class="table table-bordered ">
                                <thead>
                                <tr>
                                    <th colspan="4"> {{ trans('cruds.shippingAndClearance.fields.car_plate_letter') }}</th>
                                    <th colspan="7"> {{ trans('cruds.shippingAndClearance.fields.car_plate_number') }}</th>
                                    <th colspan="1"> {{ 'container size'  }}</th>
                                    <th><a id="addRow" href="#" class="btn btn-info addRow " >+</a></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="text" name="first_latter[]"
                                               onkeypress="return /[a-z]/i.test(event.key)" class="form-control inputs "
                                               maxlength="1" size="1"  ></td>
                                    <td><input type="text" name="sec_latter[]"
                                                                                      onkeypress="return /[a-z]/i.test(event.key)" class="form-control inputs "
                                                                                      maxlength="1" size="1"></td>
                                    <td><input type="text" name="third_latter[]"
                                               onkeypress="return /[a-z]/i.test(event.key)" class="form-control inputs "
                                               maxlength="1" size="1"></td>
                                    <td><input type="text" name="forth_letter[]"
                                               onkeypress="return /[a-z]/i.test(event.key)" class="form-control"
                                               maxlength="1" size="1"></td>
                                    <td><input
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type="number"
                                            maxlength="1" name="st_number[]"
                                            class="form-control" min="-1" max="9" size="1"></td>
                                    <td><input
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice( this.maxLength);"
                                            type="number"
                                            maxlength="1" name="sec_number[]"  class="form-control" min="-1"
                                            max="9" size="1"></td>
                                    <td><input
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(this.maxLength);"
                                            type="number"
                                            maxlength="1" name="third_number[]" class="form-control" min="-1"
                                            max="9" size="1"></td>
                                    <td><input
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type="number"
                                            maxlength="1" name="forth_number[]"  class="form-control" min="-1"
                                            max="9" size="1"></td>
                                    <td><input
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type="number"
                                            maxlength="1" name="fifth_number[]"  class="form-control" min="-1"
                                            max="9" size="1"></td>
                                    <td><input
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type="number"
                                            maxlength="1" name="sixth_number[]"  class="form-control" min="-1"
                                            max="9" size="1"></td>
                                    <td><input
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type="number"
                                            maxlength="1" name="seventh_number[]"  class="form-control" min="-1"
                                            max="9" size="1"></td>

                                    <td><select name="con_size[]" id="con_size">
                                            <option value="20"> 20</option>
                                            <option value="40"> 40</option>

                                        </select></td>
                                    <td><a href="#" class="btn btn-danger remove">-</a></td>
                                </tr>
                                </tbody>
                            </table>


                <div class="form-row col-2" style="display: inline-block">
                    <button class="btn btn-info" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
                <div class="form-group float-left" style="display: inline-block">
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
$('.card-body').on('keyup','#policy_replacement_fee,#shipment_fees,#extra_fees' ,function () {
    var form =$(this).parent().parent();
var policy_replacement_fee = form.find('#policy_replacement_fee').val() ;
    var shipment_fees = form.find('#shipment_fees').val() ;
    var extra_fees = form.find('#extra_fees').val() ;
    var total_amount= ( Number(policy_replacement_fee) + Number(shipment_fees) + Number(extra_fees) );
    form.find('#total_amount').val(total_amount);


});
        $('.addRow').on('click', function (e) {
            e.preventDefault();
            ajaxadd();
            addRow();


        });

        function addRow() {
            var tr = ` <tr>
                                    <td><input type="text" name="first_latter[]"
                                               onkeypress="return /[a-z]/i.test(event.key)" class="form-control inputs "
                                               maxlength="1" size="1"  ></td>
                                    <td><input type="text" name="sec_latter[]"
                                                                                      onkeypress="return /[a-z]/i.test(event.key)" class="form-control inputs "
                                                                                      maxlength="1" size="1"></td>
                                    <td><input type="text" name="third_latter[]"
                                               onkeypress="return /[a-z]/i.test(event.key)" class="form-control inputs "
                                               maxlength="1" size="1"></td>
                                    <td><input type="text" name="forth_letter[]"
                                               onkeypress="return /[a-z]/i.test(event.key)" class="form-control"
                                               maxlength="1" size="1"></td>
                                    <td><input
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type="number"
                                            maxlength="1" name="st_number[]"
                                            class="form-control" min="-1" max="9" size="1"></td>
                                    <td><input
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice( this.maxLength);"
                                            type="number"
                                            maxlength="1" name="sec_number[]"  class="form-control" min="-1"
                                            max="9" size="1"></td>
                                    <td><input
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(this.maxLength);"
                                            type="number"
                                            maxlength="1" name="third_number[]" class="form-control" min="-1"
                                            max="9" size="1"></td>
                                    <td><input
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type="number"
                                            maxlength="1" name="forth_number[]"  class="form-control" min="-1"
                                            max="9" size="1"></td>
                                    <td><input
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type="number"
                                            maxlength="1" name="fifth_number[]"  class="form-control" min="-1"
                                            max="9" size="1"></td>
                                    <td><input
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type="number"
                                            maxlength="1" name="sixth_number[]"  class="form-control" min="-1"
                                            max="9" size="1"></td>
                                    <td><input
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type="number"
                                            maxlength="1" name="seventh_number[]"  class="form-control" min="-1"
                                            max="9" size="1"></td>

                                    <td><select name="con_size[]" id="con_size">
                                            <option value="20"> 20</option>
                                            <option value="40"> 40</option>

                                        </select></td>
                                    <td><a href="#" class="btn btn-danger remove">-</a></td>
                                </tr>`;
            $('tbody').append(tr);

        };

        function ajaxadd(){


        };



        $('tbody').on('click', '.remove', function () {
            $(this).parent().parent().remove();
        });
    </script>
    <script>

        $(document).on('click', '#savecar ', function (e) {
            e.preventDefault();
            $.ajax({

                type: 'post',
                url: "{{ route('admin.ContainerNumber.store') }}",

                data:{

                    '_token': "{{csrf_token()}}",

                },

            });

        });

    </script>

@endsection
