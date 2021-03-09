@extends('layouts.admin')
@section('content')
    @can('receiptdelivery_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.receiptdeliveries.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.receiptdelivery.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.receiptdelivery.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Receiptdelivery">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.receiptdelivery.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptdelivery.fields.cus_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptdelivery.fields.cus_acc_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptdelivery.fields.recipient') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptdelivery.fields.recipient_address') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptdelivery.fields.contact') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptdelivery.fields.sec_contact') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptdelivery.fields.file_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptdelivery.fields.p_p_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptdelivery.fields.eta_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptdelivery.fields.policy_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptdelivery.fields.ship_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptdelivery.fields.driver_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.driverData.fields.driver_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptdelivery.fields.car_plate') }}
                    </th>
                    <th>
                        {{ trans('cruds.carslist.fields.car_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptdelivery.fields.leave_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptdelivery.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.receiptdelivery.fields.created_at') }}
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
            @can('receiptdelivery_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.receiptdeliveries.massDestroy') }}",
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
                ajax: "{{ route('admin.receiptdeliveries.index') }}",
                columns: [
                    { data: 'placeholder', name: 'placeholder' },
                    { data: 'id', name: 'id' },
                    { data: 'cus_name', name: 'cus_name' },
                    { data: 'cus_acc_number', name: 'cus_acc_number' },
                    { data: 'recipient', name: 'recipient' },
                    { data: 'recipient_address', name: 'recipient_address' },
                    { data: 'contact', name: 'contact' },
                    { data: 'sec_contact', name: 'sec_contact' },
                    { data: 'file_number', name: 'file_number' },
                    { data: 'p_p_no', name: 'p_p_no' },
                    { data: 'eta_date', name: 'eta_date' },
                    { data: 'policy_no', name: 'policy_no' },
                    { data: 'ship_name', name: 'ship_name' },
                    { data: 'driver_name_name', name: 'driver_name.name' },
                    { data: 'driver_name.driver_no', name: 'driver_name.driver_no' },
                    { data: 'car_plate_car_plate', name: 'car_plate.car_plate' },
                    { data: 'car_plate.car_type', name: 'car_plate.car_type' },
                    { data: 'leave_date', name: 'leave_date' },
                    { data: 'status', name: 'status' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'actions', name: '{{ trans('global.actions') }}' }
                ],
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            };
            let table = $('.datatable-Receiptdelivery').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });

    </script>
@endsection
