@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.receiptdelivery.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.receiptdeliveries.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptdelivery.fields.id') }}
                        </th>
                        <td>
                            {{ $receiptdelivery->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptdelivery.fields.cus_name') }}
                        </th>
                        <td>
                            {{ $receiptdelivery->cus_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptdelivery.fields.cus_acc_number') }}
                        </th>
                        <td>
                            {{ $receiptdelivery->cus_acc_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptdelivery.fields.recipient') }}
                        </th>
                        <td>
                            {{ $receiptdelivery->recipient }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptdelivery.fields.recipient_address') }}
                        </th>
                        <td>
                            {{ $receiptdelivery->recipient_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptdelivery.fields.contact') }}
                        </th>
                        <td>
                            {{ $receiptdelivery->contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptdelivery.fields.sec_contact') }}
                        </th>
                        <td>
                            {{ $receiptdelivery->sec_contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptdelivery.fields.file_number') }}
                        </th>
                        <td>
                            {{ $receiptdelivery->file_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptdelivery.fields.p_p_no') }}
                        </th>
                        <td>
                            {{ $receiptdelivery->p_p_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptdelivery.fields.eta_date') }}
                        </th>
                        <td>
                            {{ $receiptdelivery->eta_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptdelivery.fields.policy_no') }}
                        </th>
                        <td>
                            {{ $receiptdelivery->policy_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptdelivery.fields.ship_name') }}
                        </th>
                        <td>
                            {{ $receiptdelivery->ship_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptdelivery.fields.driver_name') }}
                        </th>
                        <td>
                            {{ $receiptdelivery->driver_name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptdelivery.fields.car_plate') }}
                        </th>
                        <td>
                            {{ $receiptdelivery->car_plate->car_plate ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptdelivery.fields.leave_date') }}
                        </th>
                        <td>
                            {{ $receiptdelivery->leave_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptdelivery.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Receiptdelivery::STATUS_SELECT[$receiptdelivery->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptdelivery.fields.created_at') }}
                        </th>
                        <td>
                            {{ $receiptdelivery->created_at }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.receiptdeliveries.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
