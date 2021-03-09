@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.carslist.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.carslists.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.carslist.fields.id') }}
                        </th>
                        <td>
                            {{ $carslist->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carslist.fields.car_type') }}
                        </th>
                        <td>
                            {{ $carslist->car_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carslist.fields.car_plate') }}
                        </th>
                        <td>
                            {{ $carslist->car_plate }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.carslists.index') }}">
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
                <a class="nav-link" href="#car_plate_receiptdeliveries" role="tab" data-toggle="tab">
                    {{ trans('cruds.receiptdelivery.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="car_plate_receiptdeliveries">
                @includeIf('admin.carslists.relationships.carPlateReceiptdeliveries', ['receiptdeliveries' => $carslist->carPlateReceiptdeliveries])
            </div>
        </div>
    </div>

@endsection
