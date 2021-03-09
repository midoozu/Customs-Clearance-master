@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.carPermission.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.car-permissions.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.carPermission.fields.id') }}
                        </th>
                        <td>
                            {{ $carPermission->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carPermission.fields.file_number') }}
                        </th>
                        <td>
                            {{ $carPermission->file_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carPermission.fields.permission_date') }}
                        </th>
                        <td>
                            {{ $carPermission->permission_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carPermission.fields.exit_date') }}
                        </th>
                        <td>
                            {{ $carPermission->exit_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carPermission.fields.return_date') }}
                        </th>
                        <td>
                            {{ $carPermission->return_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carPermission.fields.truck_number') }}
                        </th>
                        <td>
                            {{ $carPermission->truck_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carPermission.fields.car_type') }}
                        </th>
                        <td>
                            {{ $carPermission->car_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carPermission.fields.driver_name') }}
                        </th>
                        <td>
                            {{ $carPermission->driver_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carPermission.fields.driver_number') }}
                        </th>
                        <td>
                            {{ $carPermission->driver_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carPermission.fields.attachments') }}
                        </th>
                        <td>
                            @foreach($carPermission->attachments as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.car-permissions.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
