@extends('layouts.admin')
@section('content')
    @can('invoice_translate_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.invoice-translates.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.invoiceTranslate.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.invoiceTranslate.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-InvoiceTranslate">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.arabic_desc') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.en_desc') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.customs_item') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.currency') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.manufacturing_country') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.transaction_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.saber_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.exemption_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.shipment_fee') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoiceTranslates as $key => $invoiceTranslate)
                        <tr data-entry-id="{{ $invoiceTranslate->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $invoiceTranslate->id ?? '' }}
                            </td>
                            <td>
                                {{ $invoiceTranslate->arabic_desc ?? '' }}
                            </td>
                            <td>
                                {{ $invoiceTranslate->en_desc ?? '' }}
                            </td>
                            <td>
                                {{ $invoiceTranslate->customs_item ?? '' }}
                            </td>
                            <td>
                                {{ $invoiceTranslate->currency ?? '' }}
                            </td>
                            <td>
                                {{ $invoiceTranslate->quantity ?? '' }}
                            </td>
                            <td>
                                {{ $invoiceTranslate->manufacturing_country ?? '' }}
                            </td>
                            <td>
                                {{ $invoiceTranslate->transaction_number ?? '' }}
                            </td>
                            <td>
                                {{ $invoiceTranslate->saber_number ?? '' }}
                            </td>
                            <td>
                                {{ $invoiceTranslate->exemption_number ?? '' }}
                            </td>
                            <td>
                                {{ $invoiceTranslate->shipment_fee ?? '' }}
                            </td>
                            <td>
                                @can('invoice_translate_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.invoice-translates.show', $invoiceTranslate->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('invoice_translate_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.invoice-translates.edit', $invoiceTranslate->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('invoice_translate_delete')
                                    <form action="{{ route('admin.invoice-translates.destroy', $invoiceTranslate->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('invoice_translate_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.invoice-translates.massDestroy') }}",
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
            let table = $('.datatable-InvoiceTranslate:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
