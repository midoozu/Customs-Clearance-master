@extends('layouts.admin')
@section('content')
    @can('shipping_and_clearance_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.shipping-and-clearances.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.shippingAndClearance.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.shippingAndClearance.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table  id="test" class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ShippingAndClearance" >
                <thead>
                <tr>
                    <th width="10px" >

                    </th>
                    <th >
                        {{ trans('cruds.shippingAndClearance.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.customer_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.int_order_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.supplier_invoice_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.supplier_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.shipping_policy_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.transaction_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.transaction_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.arrival_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.ship_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.discharge_company') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.authorization_delivery_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.authorization_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.statement_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.statement_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.shipment_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.container_partial_wight') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.shipment_fees') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.policy_replacement_fee') }}
                    </th>
                    <th>
                        {{ trans('cruds.shippingAndClearance.fields.extra_fees') }}
                    </th>
                    <th >
                        {{ trans('cruds.shippingAndClearance.fields.total_amount') }}
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
            @can('shipping_and_clearance_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.shipping-and-clearances.massDestroy') }}",
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
                ajax: "{{ route('admin.shipping-and-clearances.index') }}",
                columns: [

                    { data: 'placeholder', name: 'placeholder' },
                    { data: 'id', name: 'id' },
                    { data: 'customer_name_name', name: 'customer_name.name' },
                    { data: 'int_order_no', name: 'int_order_no' },
                    { data: 'supplier_invoice_number', name: 'supplier_invoice_number' },
                    { data: 'supplier_name', name: 'supplier_name' },
                    { data: 'shipping_policy_number', name: 'shipping_policy_number' },
                    { data: 'transaction_number', name: 'transaction_number' },
                    { data: 'transaction_date', name: 'transaction_date' },
                    { data: 'arrival_date', name: 'arrival_date' },
                    { data: 'ship_name', name: 'ship_name' },
                    { data: 'discharge_company', name: 'discharge_company' },
                    { data: 'authorization_delivery_number', name: 'authorization_delivery_number' },
                    { data: 'authorization_date', name: 'authorization_date' },
                    { data: 'statement_number', name: 'statement_number' },
                    { data: 'statement_date', name: 'statement_date' },
                    { data: 'shipment_type', name: 'shipment_type' },
                    { data: 'container_partial_wight', name: 'container_partial_wight' },
                    { data: 'shipment_fees', name: 'shipment_fees' },
                    { data: 'policy_replacement_fee', name: 'policy_replacement_fee' },
                    { data: 'extra_fees', name: 'extra_fees' },
                    { data: 'total_amount', name: 'total_amount' },
                    { data: 'actions', name: '{{ trans('global.actions') }}' },

                ],
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            };
            let table = $('.datatable-ShippingAndClearance').DataTable(dtOverrideGlobals);
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
