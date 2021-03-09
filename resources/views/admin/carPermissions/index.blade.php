@extends('layouts.admin')
@section('content')
    @can('car_permission_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.car-permissions.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.carPermission.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.carPermission.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-CarPermission">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.carPermission.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.carPermission.fields.file_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.carPermission.fields.permission_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.carPermission.fields.exit_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.carPermission.fields.return_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.carPermission.fields.truck_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.carPermission.fields.car_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.carPermission.fields.driver_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.carPermission.fields.driver_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.carPermission.fields.attachments') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carPermissions as $key => $carPermission)
                        <tr data-entry-id="{{ $carPermission->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $carPermission->id ?? '' }}
                            </td>
                            <td>
                                {{ $carPermission->file_number ?? '' }}
                            </td>
                            <td>
                                {{ $carPermission->permission_date ?? '' }}
                            </td>
                            <td>
                                {{ $carPermission->exit_date ?? '' }}
                            </td>
                            <td>
                                {{ $carPermission->return_date ?? '' }}
                            </td>
                            <td>
                                {{ $carPermission->truck_number ?? '' }}
                            </td>
                            <td>
                                {{ $carPermission->car_type ?? '' }}
                            </td>
                            <td>
                                {{ $carPermission->driver_name ?? '' }}
                            </td>
                            <td>
                                {{ $carPermission->driver_number ?? '' }}
                            </td>
                            <td>
                                @foreach($carPermission->attachments as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('car_permission_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.car-permissions.show', $carPermission->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('car_permission_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.car-permissions.edit', $carPermission->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('car_permission_delete')
                                    <form action="{{ route('admin.car-permissions.destroy', $carPermission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
            @can('car_permission_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.car-permissions.massDestroy') }}",
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
            let table = $('.datatable-CarPermission:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
