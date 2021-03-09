@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.receiptVoucher.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.receipt-vouchers.store") }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group col-2" style="display: inline-block ">
                    <label for="trx_number_id">{{ trans('cruds.invoice.fields.trx_number') }}</label>
                    <select class="form-control  select2 {{ $errors->has('trx_number') ? 'is-invalid' : '' }}"
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
                <div class="form-group" style="display: inline-block">
                    <label class="required" for="cus_acc_number">{{ trans('cruds.receiptVoucher.fields.cus_acc_number') }}</label>
                    <input class="form-control {{ $errors->has('cus_acc_number') ? 'is-invalid' : '' }}" type="number" name="cus_acc_number" id="cus_acc_number" value="{{ old('cus_acc_number', '') }}" step="1" required>
                    @if($errors->has('cus_acc_number'))
                        <span class="text-danger">{{ $errors->first('cus_acc_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.cus_acc_number_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label for="cus_name">{{ trans('cruds.receiptVoucher.fields.cus_name') }}</label>
                    <input class="form-control {{ $errors->has('cus_name') ? 'is-invalid' : '' }}" type="text" name="cus_name" id="cus_name" value="{{ old('cus_name', '') }}">
                    @if($errors->has('cus_name'))
                        <span class="text-danger">{{ $errors->first('cus_name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.cus_name_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label class="required" for="trx_date">{{ trans('cruds.receiptVoucher.fields.trx_date') }}</label>
                    <input class="form-control date {{ $errors->has('trx_date') ? 'is-invalid' : '' }}" type="text" name="trx_date" id="trx_date" value="{{ old('trx_date') }}" required>
                    @if($errors->has('trx_date'))
                        <span class="text-danger">{{ $errors->first('trx_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.trx_date_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label class="required" for="cons_name">{{ trans('cruds.receiptVoucher.fields.cons_name') }}</label>
                    <input class="form-control {{ $errors->has('cons_name') ? 'is-invalid' : '' }}" type="text" name="cons_name" id="cons_name" value="{{ old('cons_name', '') }}" required>
                    @if($errors->has('cons_name'))
                        <span class="text-danger">{{ $errors->first('cons_name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.cons_name_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label class="required" for="bl_no">{{ trans('cruds.receiptVoucher.fields.bl_no') }}</label>
                    <input class="form-control {{ $errors->has('bl_no') ? 'is-invalid' : '' }}" type="number" name="bl_no" id="bl_no" value="{{ old('bl_no', '') }}" step="1" required>
                    @if($errors->has('bl_no'))
                        <span class="text-danger">{{ $errors->first('bl_no') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.bl_no_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label class="required" for="eta_date">{{ trans('cruds.receiptVoucher.fields.eta_date') }}</label>
                    <input class="form-control date {{ $errors->has('eta_date') ? 'is-invalid' : '' }}" type="text" name="eta_date" id="eta_date" value="{{ old('eta_date') }}" required>
                    @if($errors->has('eta_date'))
                        <span class="text-danger">{{ $errors->first('eta_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.eta_date_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label class="required" for="ship_name">{{ trans('cruds.receiptVoucher.fields.ship_name') }}</label>
                    <input class="form-control {{ $errors->has('ship_name') ? 'is-invalid' : '' }}" type="text" name="ship_name" id="ship_name" value="{{ old('ship_name', '') }}" required>
                    @if($errors->has('ship_name'))
                        <span class="text-danger">{{ $errors->first('ship_name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.ship_name_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label class="required" for="arrival_date">{{ trans('cruds.receiptVoucher.fields.arrival_date') }}</label>
                    <input class="form-control date {{ $errors->has('arrival_date') ? 'is-invalid' : '' }}" type="text" name="arrival_date" id="arrival_date" value="{{ old('arrival_date') }}" required>
                    @if($errors->has('arrival_date'))
                        <span class="text-danger">{{ $errors->first('arrival_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.arrival_date_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label class="required" for="discharge_company">{{ trans('cruds.receiptVoucher.fields.discharge_company') }}</label>
                    <input class="form-control {{ $errors->has('discharge_company') ? 'is-invalid' : '' }}" type="text" name="discharge_company" id="discharge_company" value="{{ old('discharge_company', '') }}" required>
                    @if($errors->has('discharge_company'))
                        <span class="text-danger">{{ $errors->first('discharge_company') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.discharge_company_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label class="required" for="authorization_number">{{ trans('cruds.receiptVoucher.fields.authorization_number') }}</label>
                    <input class="form-control {{ $errors->has('authorization_number') ? 'is-invalid' : '' }}" type="number" name="authorization_number" id="authorization_number" value="{{ old('authorization_number', '') }}" step="1" required>
                    @if($errors->has('authorization_number'))
                        <span class="text-danger">{{ $errors->first('authorization_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.authorization_number_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label class="required" for="authorization_date">{{ trans('cruds.receiptVoucher.fields.authorization_date') }}</label>
                    <input class="form-control date {{ $errors->has('authorization_date') ? 'is-invalid' : '' }}" type="text" name="authorization_date" id="authorization_date" value="{{ old('authorization_date') }}" required>
                    @if($errors->has('authorization_date'))
                        <span class="text-danger">{{ $errors->first('authorization_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.authorization_date_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label class="required" for="statement_number">{{ trans('cruds.receiptVoucher.fields.statement_number') }}</label>
                    <input class="form-control {{ $errors->has('statement_number') ? 'is-invalid' : '' }}" type="number" name="statement_number" id="statement_number" value="{{ old('statement_number', '') }}" step="1" required>
                    @if($errors->has('statement_number'))
                        <span class="text-danger">{{ $errors->first('statement_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.statement_number_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label class="required" for="statement_date">{{ trans('cruds.receiptVoucher.fields.statement_date') }}</label>
                    <input class="form-control date {{ $errors->has('statement_date') ? 'is-invalid' : '' }}" type="text" name="statement_date" id="statement_date" value="{{ old('statement_date') }}" required>
                    @if($errors->has('statement_date'))
                        <span class="text-danger">{{ $errors->first('statement_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.statement_date_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label class="required" for="delivery_date">{{ trans('cruds.receiptVoucher.fields.delivery_date') }}</label>
                    <input class="form-control date {{ $errors->has('delivery_date') ? 'is-invalid' : '' }}" type="text" name="delivery_date" id="delivery_date" value="{{ old('delivery_date') }}" required>
                    @if($errors->has('delivery_date'))
                        <span class="text-danger">{{ $errors->first('delivery_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.delivery_date_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label for="container_partial_wight">{{ trans('cruds.receiptVoucher.fields.container_partial_wight') }}</label>
                    <input class="form-control {{ $errors->has('container_partial_wight') ? 'is-invalid' : '' }}" type="number" name="container_partial_wight" id="container_partial_wight" value="{{ old('container_partial_wight', '') }}" step="0.01">
                    @if($errors->has('container_partial_wight'))
                        <span class="text-danger">{{ $errors->first('container_partial_wight') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.container_partial_wight_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label class="required" for="shipment_fee">{{ trans('cruds.receiptVoucher.fields.shipment_fee') }}</label>
                    <input class="form-control {{ $errors->has('shipment_fee') ? 'is-invalid' : '' }}" type="number" name="shipment_fee" id="shipment_fee" value="{{ old('shipment_fee', '') }}" step="0.01" required>
                    @if($errors->has('shipment_fee'))
                        <span class="text-danger">{{ $errors->first('shipment_fee') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.shipment_fee_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label for="extra_fee">{{ trans('cruds.receiptVoucher.fields.extra_fee') }}</label>
                    <input class="form-control {{ $errors->has('extra_fee') ? 'is-invalid' : '' }}" type="number" name="extra_fee" id="extra_fee" value="{{ old('extra_fee', '') }}" step="0.01">
                    @if($errors->has('extra_fee'))
                        <span class="text-danger">{{ $errors->first('extra_fee') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.extra_fee_helper') }}</span>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label for="total_amount">{{ trans('cruds.receiptVoucher.fields.total_amount') }}</label>
                    <input class="form-control {{ $errors->has('total_amount') ? 'is-invalid' : '' }}" type="number" name="total_amount" id="total_amount" value="{{ old('total_amount', '') }}" step="0.01">
                    @if($errors->has('total_amount'))
                        <span class="text-danger">{{ $errors->first('total_amount') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.total_amount_helper') }}</span>
                </div>
                <div class="form-group" >
                    <label for="docs">{{ trans('cruds.receiptVoucher.fields.docs') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('docs') ? 'is-invalid' : '' }}" id="docs-dropzone">
                    </div>
                    @if($errors->has('docs'))
                        <span class="text-danger">{{ $errors->first('docs') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.receiptVoucher.fields.docs_helper') }}</span>
                </div>
                <div class="form-group float-right" >
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
        var uploadedDocsMap = {}
        Dropzone.options.docsDropzone = {
            url: '{{ route('admin.receipt-vouchers.storeMedia') }}',
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 10
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="docs[]" value="' + response.name + '">')
                uploadedDocsMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocsMap[file.name]
                }
                $('form').find('input[name="docs[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($receiptVoucher) && $receiptVoucher->docs)
                var files =
                {!! json_encode($receiptVoucher->docs) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="docs[]" value="' + file.file_name + '">')
                }
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
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
