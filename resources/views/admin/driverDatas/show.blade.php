@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.driverData.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.driver-datas.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.driverData.fields.id') }}
                        </th>
                        <td>
                            {{ $driverData->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driverData.fields.name') }}
                        </th>
                        <td>
                            {{ $driverData->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driverData.fields.driver_no') }}
                        </th>
                        <td>
                            {{ $driverData->driver_no }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.driver-datas.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>
        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#driver_name_receiptdeliveries" role="tab" data-toggle="tab">
                    {{ trans('cruds.receiptdelivery.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="driver_name_receiptdeliveries">
                @includeIf('admin.driverDatas.relationships.driverNameReceiptdeliveries', ['receiptdeliveries' => $driverData->driverNameReceiptdeliveries])
            </div>
        </div>
    </div>

@endsection
