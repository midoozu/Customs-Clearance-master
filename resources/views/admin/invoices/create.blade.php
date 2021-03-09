@extends('layouts.admin')
@section('content')


    <div class="card-header row">
       <div class="col-md-3"  > <label><input type="radio" name="colorRadio" value="red">
               {{ trans('global.create') }} {{ trans('cruds.invoice.title_singular') }} {{ trans('cruds.invoice.fields.clearance') }}           </label></div>
        <div  class="col-md-3" ><label><input type="radio" name="colorRadio" value="green">
                {{ trans('global.create') }} {{ trans('cruds.invoice.title_singular') }} {{ trans('cruds.invoice.fields.receipt-vouchers') }}
            </label></div>

    </div>
    <div class="red box" style="display: none"><div class="card">
            <div class="card-header">
                {{ trans('global.create') }} {{ trans('cruds.invoice.title_singular') }} {{ trans('cruds.invoice.fields.clearance') }}           </label></div>

        </div>

            <div class="card-body">
                <form method="POST" action="{{ route("admin.invoices.store") }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-2" style="display: inline-block ">
                        <label for="trx_number_id">{{ trans('cruds.invoice.fields.trx_number') }}</label>
                        <select class="form-control select2 {{ $errors->has('trx_number') ? 'is-invalid' : '' }}"
                                name="trx_number_id" id="trx_number_id">
                            @foreach($trx_numbers as $id => $trx_number)
                                <option
                                    value="{{ $id }}" {{ old('trx_number_id') == $id ? 'selected' : '' }}>{{ $trx_number }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('trx_number'))
                            <span class="text-danger">{{ $errors->first('trx_number') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.trx_number_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label for="inv_date">{{ trans('cruds.invoice.fields.inv_date') }}</label>
                        <input class="form-control date {{ $errors->has('inv_date') ? 'is-invalid' : '' }}" type="text"
                               name="inv_date" id="inv_date" value="{{ old('inv_date') }}">
                        @if($errors->has('inv_date'))
                            <span class="text-danger">{{ $errors->first('inv_date') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.inv_date_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label for="inv_type_id">{{ trans('cruds.invoice.fields.inv_type') }}</label>
                        <select class="form-control select2 {{ $errors->has('inv_type') ? 'is-invalid' : '' }}"
                                name="inv_type_id" id="inv_type_id">
                            @foreach($inv_types as $id => $inv_type)
                                <option
                                    value="{{ $id }}" {{ old('inv_type_id') == $id ? 'selected' : '' }}>{{ $inv_type }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('inv_type'))
                            <span class="text-danger">{{ $errors->first('inv_type') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.inv_type_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label class="required" for="pay_type_id">{{ trans('cruds.invoice.fields.pay_type') }}</label>
                        <select class="form-control select2 {{ $errors->has('pay_type') ? 'is-invalid' : '' }}"
                                name="pay_type_id" id="pay_type_id" required>
                            @foreach($pay_types as $id => $pay_type)
                                <option
                                    value="{{ $id }}" {{ old('pay_type_id') == $id ? 'selected' : '' }}>{{ $pay_type }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('pay_type'))
                            <span class="text-danger">{{ $errors->first('pay_type') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.pay_type_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label class="required" for="cus_name_id">{{ trans('cruds.invoice.fields.cus_name') }}</label>
                        <select class="form-control select2 {{ $errors->has('cus_name') ? 'is-invalid' : '' }}"
                                name="cus_name_id" id="cus_name_id" required>
                            @foreach($cus_names as $id => $cus_name)
                                <option
                                    value="{{ $id }}" {{ old('cus_name_id') == $id ? 'selected' : '' }}>{{ $cus_name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('cus_name'))
                            <span class="text-danger">{{ $errors->first('cus_name') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.cus_name_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label for="ship_name_id">{{ trans('cruds.invoice.fields.ship_name') }}</label>
                        <select class="form-control select2 {{ $errors->has('ship_name') ? 'is-invalid' : '' }}"
                                name="ship_name_id" id="ship_name_id">
                            @foreach($ship_names as $id => $ship_name)
                                <option
                                    value="{{ $id }}" {{ old('ship_name_id') == $id ? 'selected' : '' }}>{{ $ship_name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('ship_name'))
                            <span class="text-danger">{{ $errors->first('ship_name') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.ship_name_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label class="required" for="shipped_from">{{ trans('cruds.invoice.fields.shipped_from') }}</label>
                        <input class="form-control {{ $errors->has('shipped_from') ? 'is-invalid' : '' }}" type="text"
                               name="shipped_from" id="shipped_from" value="{{ old('shipped_from', '') }}" required>
                        @if($errors->has('shipped_from'))
                            <span class="text-danger">{{ $errors->first('shipped_from') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.shipped_from_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label for="import_statement">{{ trans('cruds.invoice.fields.import_statement') }}</label>
                        <input class="form-control {{ $errors->has('import_statement') ? 'is-invalid' : '' }}" type="text"
                               name="import_statement" id="import_statement" value="{{ old('import_statement', '') }}">
                        @if($errors->has('import_statement'))
                            <span class="text-danger">{{ $errors->first('import_statement') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.import_statement_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label for="import_statment_date">{{ trans('cruds.invoice.fields.import_statment_date') }}</label>
                        <input class="form-control date {{ $errors->has('import_statment_date') ? 'is-invalid' : '' }}"
                               type="text" name="import_statment_date" id="import_statment_date"
                               value="{{ old('import_statment_date') }}">
                        @if($errors->has('import_statment_date'))
                            <span class="text-danger">{{ $errors->first('import_statment_date') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.import_statment_date_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label class="required"
                               for="no_of_packages">{{ trans('cruds.invoice.fields.no_of_packages') }}</label>
                        <input class="form-control {{ $errors->has('no_of_packages') ? 'is-invalid' : '' }}" type="number"
                               name="no_of_packages" id="no_of_packages" value="{{ old('no_of_packages', '') }}" step="1"
                               required>
                        @if($errors->has('no_of_packages'))
                            <span class="text-danger">{{ $errors->first('no_of_packages') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.no_of_packages_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label for="pay_order_no">{{ trans('cruds.invoice.fields.pay_order_no') }}</label>
                        <input class="form-control {{ $errors->has('pay_order_no') ? 'is-invalid' : '' }}" type="number"
                               name="pay_order_no" id="pay_order_no" value="{{ old('pay_order_no', '') }}" step="1">
                        @if($errors->has('pay_order_no'))
                            <span class="text-danger">{{ $errors->first('pay_order_no') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.pay_order_no_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label for="pay_order_date">{{ trans('cruds.invoice.fields.pay_order_date') }}</label>
                        <input class="form-control date {{ $errors->has('pay_order_date') ? 'is-invalid' : '' }}"
                               type="text" name="pay_order_date" id="pay_order_date" value="{{ old('pay_order_date') }}">
                        @if($errors->has('pay_order_date'))
                            <span class="text-danger">{{ $errors->first('pay_order_date') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.pay_order_date_helper') }}</span>
                    </div>

                    <div class="col-md-10">
                        <div>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th> {{ trans('cruds.invoice.fields.description') }}</th>
                                    <th> {{ trans('cruds.invoice.fields.amount') }}</th>
                                    <th> {{ trans('cruds.invoice.fields.tax_percentage') }}</th>
                                    <th> {{ trans('cruds.invoice.fields.tax_amount') }}</th>
                                    <th> {{ trans('cruds.invoice.fields.total') }}</th>

                                    <th><a href="#" class="btn btn-info addRow ">+</a></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><select name="servicename[]" id="" class="form-control servicename" >
                                            <option value="0" selected="true" disabled="true"> {{trans('global.pleaseSelect')}}</option>
                                            @foreach($servics as $key => $s)
                                                <option value="{!! $key !!}"> {!! $s->servicename !!} </option>
                                            @endforeach
                                        </select> </td>
                                    <td><input type="text" name="amount[]" class="form-control amount"></td>
                                    <td><input type="text" name="tax_percentage[]" class="form-control tax_percentage"></td>
                                    <td><input type="text" name="tax_amount[]" class="form-control tax_amount"></td>
                                    <td><input type="text" name="total[]" class="form-control total"></td>
                                    <td><a href="#" class="btn btn-danger remove">-</a></td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td style="border:none"></td>
                                </tr>
                                <tr>
                                    <td style="border:none"></td>
                                    <td  ><b> {{trans('cruds.invoice.fields.total_before_tax')}} </b> </td>
                                    <td > <b> <input name="total_before_tax" value="" type="text" class="total_before_tax" readonly style="border: none"></b> </td>
                                    <td ><b class="total_discount"> {{trans('cruds.invoice.fields.total_discount')}} </b> </td>
                                    <td ><input name="total_discount" type="text" class="total_discount" ></td>
                                </tr>
                                <tr>
                                    <td style="border:none"></td>
                                    <td ><b > {{trans('cruds.invoice.fields.total_tax')}} </b> </td>
                                    <td ><input  name="total_tax" type="text" class="total_tax " style="border: none" readonly ></td>
                                    <td ><b> {{trans('cruds.invoice.fields.total_invoice_amount')}} </b> </td>
                                    <td> <b> <input name="invoice_amount" type="text" class="invoice_amount" readonly style="border: none" ></b>  </td>
                                </tr>
                                <tr>
                                    <td style="border:none"></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="form-group float-right">
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
    <div class="green box" style="display: none" ><div class="card">
            <div class="card-header">
                {{ trans('global.create') }} {{ trans('cruds.invoice.title_singular') }} {{ trans('cruds.invoice.fields.receipt-vouchers') }}

            </div>

            <div class="card-body">
                <form method="POST" action="{{ route("admin.invoices.store") }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-2" style="display: inline-block ">
                        <label for="trx_number_id">{{ trans('cruds.invoice.fields.trx_number') }}</label>
                        <select class="form-control select2 {{ $errors->has('trx_number') ? 'is-invalid' : '' }}"
                                name="trx_number_id" id="trx_number_id">
                            @foreach($trx_numbers as $id => $trx_number)
                                <option
                                    value="{{ $id }}" {{ old('trx_number_id') == $id ? 'selected' : '' }}>{{ $trx_number }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('trx_number'))
                            <span class="text-danger">{{ $errors->first('trx_number') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.trx_number_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label for="inv_date">{{ trans('cruds.invoice.fields.inv_date') }}</label>
                        <input class="form-control date {{ $errors->has('inv_date') ? 'is-invalid' : '' }}" type="text"
                               name="inv_date" id="inv_date" value="{{ old('inv_date') }}">
                        @if($errors->has('inv_date'))
                            <span class="text-danger">{{ $errors->first('inv_date') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.inv_date_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label for="inv_type_id">{{ trans('cruds.invoice.fields.inv_type') }}</label>
                        <select class="form-control select2 {{ $errors->has('inv_type') ? 'is-invalid' : '' }}"
                                name="inv_type_id" id="inv_type_id">
                            @foreach($inv_types as $id => $inv_type)
                                <option
                                    value="{{ $id }}" {{ old('inv_type_id') == $id ? 'selected' : '' }}>{{ $inv_type }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('inv_type'))
                            <span class="text-danger">{{ $errors->first('inv_type') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.inv_type_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label class="required" for="pay_type_id">{{ trans('cruds.invoice.fields.pay_type') }}</label>
                        <select class="form-control select2 {{ $errors->has('pay_type') ? 'is-invalid' : '' }}"
                                name="pay_type_id" id="pay_type_id" required>
                            @foreach($pay_types as $id => $pay_type)
                                <option
                                    value="{{ $id }}" {{ old('pay_type_id') == $id ? 'selected' : '' }}>{{ $pay_type }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('pay_type'))
                            <span class="text-danger">{{ $errors->first('pay_type') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.pay_type_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label class="required" for="cus_name_id">{{ trans('cruds.invoice.fields.cus_name') }}</label>
                        <select class="form-control select2 {{ $errors->has('cus_name') ? 'is-invalid' : '' }}"
                                name="cus_name_id" id="cus_name_id" required>
                            @foreach($cus_names as $id => $cus_name)
                                <option
                                    value="{{ $id }}" {{ old('cus_name_id') == $id ? 'selected' : '' }}>{{ $cus_name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('cus_name'))
                            <span class="text-danger">{{ $errors->first('cus_name') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.cus_name_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label for="ship_name_id">{{ trans('cruds.invoice.fields.ship_name') }}</label>
                        <select class="form-control select2 {{ $errors->has('ship_name') ? 'is-invalid' : '' }}"
                                name="ship_name_id" id="ship_name_id">
                            @foreach($ship_names as $id => $ship_name)
                                <option
                                    value="{{ $id }}" {{ old('ship_name_id') == $id ? 'selected' : '' }}>{{ $ship_name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('ship_name'))
                            <span class="text-danger">{{ $errors->first('ship_name') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.ship_name_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label class="required" for="shipped_from">{{ trans('cruds.invoice.fields.shipped_from') }}</label>
                        <input class="form-control {{ $errors->has('shipped_from') ? 'is-invalid' : '' }}" type="text"
                               name="shipped_from" id="shipped_from" value="{{ old('shipped_from', '') }}" required>
                        @if($errors->has('shipped_from'))
                            <span class="text-danger">{{ $errors->first('shipped_from') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.shipped_from_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label for="import_statement">{{ trans('cruds.invoice.fields.import_statement') }}</label>
                        <input class="form-control {{ $errors->has('import_statement') ? 'is-invalid' : '' }}" type="text"
                               name="import_statement" id="import_statement" value="{{ old('import_statement', '') }}">
                        @if($errors->has('import_statement'))
                            <span class="text-danger">{{ $errors->first('import_statement') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.import_statement_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label for="import_statment_date">{{ trans('cruds.invoice.fields.import_statment_date') }}</label>
                        <input class="form-control date {{ $errors->has('import_statment_date') ? 'is-invalid' : '' }}"
                               type="text" name="import_statment_date" id="import_statment_date"
                               value="{{ old('import_statment_date') }}">
                        @if($errors->has('import_statment_date'))
                            <span class="text-danger">{{ $errors->first('import_statment_date') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.import_statment_date_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label class="required"
                               for="no_of_packages">{{ trans('cruds.invoice.fields.no_of_packages') }}</label>
                        <input class="form-control {{ $errors->has('no_of_packages') ? 'is-invalid' : '' }}" type="number"
                               name="no_of_packages" id="no_of_packages" value="{{ old('no_of_packages', '') }}" step="1"
                               required>
                        @if($errors->has('no_of_packages'))
                            <span class="text-danger">{{ $errors->first('no_of_packages') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.no_of_packages_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label for="pay_order_no">{{ trans('cruds.invoice.fields.pay_order_no') }}</label>
                        <input class="form-control {{ $errors->has('pay_order_no') ? 'is-invalid' : '' }}" type="number"
                               name="pay_order_no" id="pay_order_no" value="{{ old('pay_order_no', '') }}" step="1">
                        @if($errors->has('pay_order_no'))
                            <span class="text-danger">{{ $errors->first('pay_order_no') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.pay_order_no_helper') }}</span>
                    </div>
                    <div class="form-group col-2" style="display: inline-block ">
                        <label for="pay_order_date">{{ trans('cruds.invoice.fields.pay_order_date') }}</label>
                        <input class="form-control date {{ $errors->has('pay_order_date') ? 'is-invalid' : '' }}"
                               type="text" name="pay_order_date" id="pay_order_date" value="{{ old('pay_order_date') }}">
                        @if($errors->has('pay_order_date'))
                            <span class="text-danger">{{ $errors->first('pay_order_date') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.invoice.fields.pay_order_date_helper') }}</span>
                    </div>

                    <div class="col-md-10">
                        <div>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th> {{ trans('cruds.invoice.fields.description') }}</th>
                                    <th> {{ trans('cruds.invoice.fields.amount') }}</th>
                                    <th> {{ trans('cruds.invoice.fields.tax_percentage') }}</th>
                                    <th> {{ trans('cruds.invoice.fields.tax_amount') }}</th>
                                    <th> {{ trans('cruds.invoice.fields.total') }}</th>

                                    <th><a href="#" class="btn btn-info addRow ">+</a></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><select name="servicename[]" id="" class="form-control servicename" >
                                            <option value="0" selected="true" disabled="true"> {{trans('global.pleaseSelect')}}</option>
                                            @foreach($servics as $key => $s)
                                                <option value="{!! $key !!}"> {!! $s->servicename !!} </option>
                                            @endforeach
                                        </select> </td>
                                    <td><input type="text" name="amount[]" class="form-control amount"></td>
                                    <td><input type="text" name="tax_percentage[]" class="form-control tax_percentage"></td>
                                    <td><input type="text" name="tax_amount[]" class="form-control tax_amount"></td>
                                    <td><input type="text" name="total[]" class="form-control total"></td>
                                    <td><a href="#" class="btn btn-danger remove">-</a></td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td style="border:none"></td>
                                </tr>
                                <tr>
                                    <td style="border:none"></td>
                                    <td  ><b> {{trans('cruds.invoice.fields.total_before_tax')}} </b> </td>
                                    <td > <b> <input name="total_before_tax" value="" type="text" class="total_before_tax" readonly style="border: none"></b> </td>
                                    <td ><b class="total_discount"> {{trans('cruds.invoice.fields.total_discount')}} </b> </td>
                                    <td ><input name="total_discount" type="text" class="total_discount" ></td>
                                </tr>
                                <tr>
                                    <td style="border:none"></td>
                                    <td ><b > {{trans('cruds.invoice.fields.total_tax')}} </b> </td>
                                    <td ><input  name="total_tax" type="text" class="total_tax " style="border: none" readonly ></td>
                                    <td ><b> {{trans('cruds.invoice.fields.total_invoice_amount')}} </b> </td>
                                    <td> <b> <input name="invoice_amount" type="text" class="invoice_amount" readonly style="border: none" ></b>  </td>
                                </tr>
                                <tr>
                                    <td style="border:none"></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="form-group float-right">
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
        </div></div>





@endsection

@section('scripts')


    <script>

$('tbody').delegate('.servicename' ,'change',function (){

    var tr = $(this).parent().parent();
    tr.find('.amount').focus();
    var id = tr.find('.servicename').val();
    var dataid={'id': id};
    $.ajax({
    type : 'GET',
        url: "{{ route('admin.findprice') }}",
        // dataType : 'json',
        data : dataid ,
        success:function (data){
        tr.find('.amount').val(data.amount);
        tr.find('.tax_percentage').val(data.tax_percentage);
        tr.find('.tax_amount').val(data.tax_amount);
            var amount = tr.find('.amount').val() ;
            var tax_amount = tr.find('.tax_amount').val() ;
            var total= ( Number(amount) + Number(tax_amount) );
            tr.find('.total').val(total);
            total_before_tax();
            total_tax();
            invoice_amount();
        }




    });

});
        // $('tbody').delegate('.amount ,.tax_amount ' ,'keyup' ,function (){
        //
        //     var tr =$(this).parent().parent();
        //     var amount = tr.find('.amount').val() ;
        //     var tax_amount = tr.find('.tax_amount').val() ;
        //     var total= ( Number(amount) + Number(tax_amount) );
        //     tr.find('.total').val(total);
        //     total_before_tax();
        //     total_tax();
        //     invoice_amount();
        //
        //     });

        $('.addRow').on('click', function () {
            addRow();

        });

        function total_before_tax(){

          var total_before_tax=0;
          $('.amount').each(function(i,e) {
var amount=$(this).val()-0;
              total_before_tax +=amount;
          })
            $('.total_before_tax').val(total_before_tax)
        }
        function total_tax(){

            var total_tax=0;
            $('.tax_amount').each(function(i,e) {
                var tax_amount=$(this).val()-0;
                total_tax +=tax_amount;
            })
            $('.total_tax').val(total_tax)
        }
        function invoice_amount(){

            var invoice_amount=0;
            $('.total').each(function(i,e) {
                var total=$(this).val()-0;
                invoice_amount +=total;
            })
            $('.invoice_amount').val(invoice_amount)
        }


        Number.prototype.formatMoney =function (decPlaces, thouSeparator, decSeparator){
            var n = this,
                decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
                decSeparator = decSeparator == undefined ? "." : decSeparator,
                thouSeparator = thouSeparator == undefined ? "," : thouSeparator ,
                sign = n< 0 ? "-" : "",
                i = parseInt(n = Math.abs(+n || 0).toFixed(desPlaces)) + "" ,
                j = (j =  i.length) > 3 ? j % 3 : 0;
            return sign +
                (j ? i.substr(0, j) + thouSeparator : "") +
                i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSeparator) +
                (decPlaces ? decSeparator + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");

        };



        function addRow() {
            var tr = `<tr>
<td><select name="servicename[]" id="" class="form-control servicename" >
        <option value="0" selected="true" disabled="true"> {{trans('global.pleaseSelect')}}</option>
        @foreach($servics as $key => $s)
            <option value="{!! $key !!}"> {!! $s->servicename !!} </option>
        @endforeach
            </select> </td>
                                        <td><input type="text" name="amount[]" class="form-control amount"></td>
                                        <td><input type="text" name="tax_percentage[]" class="form-control tax_percentage"></td>
                                        <td><input type="text" name="tax_amount[]" class="form-control tax_amount"></td>
                                        <td><input type="text" name="total[]" class="form-control total"></td>
                                        <td><a href="#" class="btn btn-danger remove">-</a></td>
                                    </tr> `;
            $('tbody').append(tr);
        };


        $('tbody').on('click', '.remove', function () {
            $(this).parent().parent().remove();
        });
    </script>



    <script>
        $(document).ready(function(){
            $('input[type="radio"]').click(function(){
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });
        });


    </script>

    <script>

  $('#trx_number_id').on('change' ,function (){

            var input = $(this).parent().parent().parent();
            var id = input.find('#trx_number_id').val();
            var dataid={'id': id};
            $.ajax({
                type : 'GET',
                url: "{{ route('admin.findclearanceajax') }}",
                // dataType : 'json',
                data : dataid ,
                success:function (data){
                    input.find('#cus_acc_number').val(data.customer_name.acc_number);
                    input.find('#cus_name').val(data.customer_name.name);
                    input.find('#trx_date').val(data.transaction_date);
                    input.find('#ship_name').val(data.ship_name);
                    input.find('#arrival_date').val(data.arrival_date);
                    input.find('#discharge_company').val(data.discharge_company);
                    input.find('#authorization_number').val(data.authorization_delivery_number);
                    input.find('#authorization_date').val(data.authorization_date);
                    input.find('#statement_number').val(data.statement_number);
                    input.find('#statement_date').val(data.statement_date);
                    input.find('#container_partial_wight').val(data.container_partial_wight);
                }
            });
        });
    </script>

@endsection
