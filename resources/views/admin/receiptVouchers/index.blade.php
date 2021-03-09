@extends('layouts.admin')
@section('content')
    @can('receipt_voucher_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.receipt-vouchers.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.receiptVoucher.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.receiptVoucher.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ReceiptVoucher">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.cus_acc_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.cus_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.trx_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.cons_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.bl_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.eta_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.ship_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.arrival_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.discharge_company') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.authorization_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.authorization_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.statement_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.statement_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.delivery_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.container_partial_wight') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.docs') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.shipment_fee') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.extra_fee') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptVoucher.fields.total_amount') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                </thead>
            </table>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('receipt_voucher_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.receipt-vouchers.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                        return entry.id
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.receipt-vouchers.index') }}",
                columns: [
                    { data: 'placeholder', name: 'placeholder' },
                    { data: 'id', name: 'id' },
                    { data: 'cus_acc_number', name: 'cus_acc_number' },
                    { data: 'cus_name', name: 'cus_name' },
                    { data: 'trx_date', name: 'trx_date' },
                    { data: 'cons_name', name: 'cons_name' },
                    { data: 'bl_no', name: 'bl_no' },
                    { data: 'eta_date', name: 'eta_date' },
                    { data: 'ship_name', name: 'ship_name' },
                    { data: 'arrival_date', name: 'arrival_date' },
                    { data: 'discharge_company', name: 'discharge_company' },
                    { data: 'authorization_number', name: 'authorization_number' },
                    { data: 'authorization_date', name: 'authorization_date' },
                    { data: 'statement_number', name: 'statement_number' },
                    { data: 'statement_date', name: 'statement_date' },
                    { data: 'delivery_date', name: 'delivery_date' },
                    { data: 'container_partial_wight', name: 'container_partial_wight' },
                    { data: 'docs', name: 'docs', sortable: false, searchable: false },
                    { data: 'shipment_fee', name: 'shipment_fee' },
                    { data: 'extra_fee', name: 'extra_fee' },
                    { data: 'total_amount', name: 'total_amount' },
                    { data: 'actions', name: '{{ trans('global.actions') }}' }
                ],
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            };
            let table = $('.datatable-ReceiptVoucher').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });

    </script>
@endsection
