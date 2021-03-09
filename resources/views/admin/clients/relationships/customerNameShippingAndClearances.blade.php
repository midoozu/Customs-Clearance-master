<div class="m-3">
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
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-customerNameShippingAndClearances">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
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
                        <th>
                            {{ trans('cruds.shippingAndClearance.fields.total_amount') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($shippingAndClearances as $key => $shippingAndClearance)
                        <tr data-entry-id="{{ $shippingAndClearance->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $shippingAndClearance->id ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->customer_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->int_order_no ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->supplier_invoice_number ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->supplier_name ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->shipping_policy_number ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->transaction_number ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->transaction_date ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->arrival_date ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->ship_name ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->discharge_company ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->authorization_delivery_number ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->authorization_date ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->statement_number ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->statement_date ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->shipment_type ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->container_partial_wight ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->shipment_fees ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->policy_replacement_fee ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->extra_fees ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAndClearance->total_amount ?? '' }}
                            </td>
                            <td>
                                @can('shipping_and_clearance_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.shipping-and-clearances.show', $shippingAndClearance->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('shipping_and_clearance_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.shipping-and-clearances.edit', $shippingAndClearance->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('shipping_and_clearance_delete')
                                    <form action="{{ route('admin.shipping-and-clearances.destroy', $shippingAndClearance->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('shipping_and_clearance_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.shipping-and-clearances.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
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

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            });
            let table = $('.datatable-customerNameShippingAndClearances:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
