<div class="m-3">
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
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-cusNameInvoices">
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
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoices as $key => $invoice)
                        <tr data-entry-id="{{ $invoice->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $invoice->id ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->trx_number->transaction_number ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->trx_number->transaction_date ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->inv_date ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->inv_type->invoice_type ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->pay_type->payment_type ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->cus_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->cus_name->acc_number ?? '' }}
                            </td>
                            <td>
                                @if($invoice->cus_name)
                                    {{ $invoice->cus_name::TYPE_RADIO[$invoice->cus_name->type] ?? '' }}
                                @endif
                            </td>
                            <td>
                                {{ $invoice->ship_name->ship_name ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->ship_name->int_order_no ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->ship_name->shipping_policy_number ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->ship_name->arrival_date ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->ship_name->shipment_type ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->shipped_from ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->import_statement ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->import_statment_date ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->no_of_packages ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->pay_order_no ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->pay_order_date ?? '' }}
                            </td>
                            <td>
                                @can('invoice_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.invoices.show', $invoice->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('invoice_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.invoices.edit', $invoice->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('invoice_delete')
                                    <form action="{{ route('admin.invoices.destroy', $invoice->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
            @can('invoice_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.invoices.massDestroy') }}",
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
            let table = $('.datatable-cusNameInvoices:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
