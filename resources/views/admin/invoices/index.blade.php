@extends('layouts.admin')
@section('content')
    @can('invoice_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.invoices.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.invoice.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.invoice.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table id="example" class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Invoice" >
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.invoice.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice.fields.trx_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.transaction_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice.fields.inv_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice.fields.inv_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice.fields.pay_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice.fields.cus_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.client.fields.acc_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.client.fields.type') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice.fields.ship_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.int_order_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.shipping_policy_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.arrival_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.shipment_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice.fields.shipped_from') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice.fields.import_statement') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice.fields.import_statment_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice.fields.no_of_packages') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice.fields.pay_order_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice.fields.pay_order_date') }}
                    </th>
{{--                    class="CustomActions" style="position: absolute !important; z-index: 3 !important; left: 10rem !important;  "--}}
                    <th >
                        &nbsp;{{'Actions'}}
                    </th>
                </tr>
{{--                <tr>--}}
{{--                    <td>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <select class="search">--}}
{{--                            <option value>{{ trans('global.all') }}</option>--}}
{{--                            @foreach($shipping_and_clearances as $key => $item)--}}
{{--                                <option value="{{ $item->transaction_number }}">{{ $item->transaction_number }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <select class="search">--}}
{{--                            <option value>{{ trans('global.all') }}</option>--}}
{{--                            @foreach($invoices_types as $key => $item)--}}
{{--                                <option value="{{ $item->invoice_type }}">{{ $item->invoice_type }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <select class="search">--}}
{{--                            <option value>{{ trans('global.all') }}</option>--}}
{{--                            @foreach($payment_types as $key => $item)--}}
{{--                                <option value="{{ $item->payment_type }}">{{ $item->payment_type }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <select class="search">--}}
{{--                            <option value>{{ trans('global.all') }}</option>--}}
{{--                            @foreach($clients as $key => $item)--}}
{{--                                <option value="{{ $item->name }}">{{ $item->name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <select class="search">--}}
{{--                            <option value>{{ trans('global.all') }}</option>--}}
{{--                            @foreach($shipping_and_clearances as $key => $item)--}}
{{--                                <option value="{{ $item->ship_name }}">{{ $item->ship_name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                    </td>--}}
{{--                </tr>--}}
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
            @can('invoice_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.invoices.massDestroy') }}",
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
                fixedColumns: {leftColumns:true },

                aaSorting: [],
                ajax: "{{ route('admin.invoices.index') }}",
                columns: [
                    { data: 'placeholder', name: 'placeholder'},
                    { data: 'id', name: 'id' },
                    { data: 'trx_number_transaction_number', name: 'trx_number.transaction_number' },
                    { data: 'trx_number.transaction_date', name: 'trx_number.transaction_date' },
                    { data: 'inv_date', name: 'inv_date' },
                    { data: 'inv_type_invoice_type', name: 'inv_type.invoice_type' },
                    { data: 'pay_type_payment_type', name: 'pay_type.payment_type' },
                    { data: 'cus_name_name', name: 'cus_name.name' },
                    { data: 'cus_name.acc_number', name: 'cus_name.acc_number' },
                    { data: 'cus_name.type', name: 'cus_name.type' },
                    { data: 'ship_name_ship_name', name: 'ship_name.ship_name' },
                    { data: 'ship_name.int_order_no', name: 'ship_name.int_order_no' },
                    { data: 'ship_name.shipping_policy_number', name: 'ship_name.shipping_policy_number' },
                    { data: 'ship_name.arrival_date', name: 'ship_name.arrival_date' },
                    { data: 'ship_name.shipment_type', name: 'ship_name.shipment_type' },
                    { data: 'shipped_from', name: 'shipped_from' },
                    { data: 'import_statement', name: 'import_statement' },
                    { data: 'import_statment_date', name: 'import_statment_date' },
                    { data: 'no_of_packages', name: 'no_of_packages' },
                    { data: 'pay_order_no', name: 'pay_order_no' },
                    { data: 'pay_order_date', name: 'pay_order_date' },
                    { data: 'actions', name: '{{ trans('global.actions') }}' }
                ],
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            };

            let table = $('.datatable-Invoice').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

            let visibleColumnsIndexes = null;
            $('.datatable thead').on('input', '.search', function () {
                let strict = $(this).attr('strict') || false
                let value = strict && this.value ? "^" + this.value + "$" : this.value

                let index = $(this).parent().index()
                if (visibleColumnsIndexes !== null) {
                    index = visibleColumnsIndexes[index]
                }

                table
                    .column(index)
                    .search(value, strict)
                    .draw()
            });
            table.on('column-visibility.dt', function(e, settings, column, state) {
                visibleColumnsIndexes = []
                table.columns(":visible").every(function(colIdx) {
                    visibleColumnsIndexes.push(colIdx);
                });
            })

        });

    </script>
@endsection
