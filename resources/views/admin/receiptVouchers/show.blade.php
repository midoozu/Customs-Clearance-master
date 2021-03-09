@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.receiptVoucher.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.receipt-vouchers.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.id') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.cus_acc_number') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->cus_acc_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.cus_name') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->cus_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.trx_date') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->trx_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.cons_name') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->cons_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.bl_no') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->bl_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.eta_date') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->eta_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.ship_name') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->ship_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.arrival_date') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->arrival_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.discharge_company') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->discharge_company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.authorization_number') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->authorization_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.authorization_date') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->authorization_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.statement_number') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->statement_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.statement_date') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->statement_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.delivery_date') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->delivery_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.container_partial_wight') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->container_partial_wight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.docs') }}
                        </th>
                        <td>
                            @foreach($receiptVoucher->docs as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.shipment_fee') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->shipment_fee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.extra_fee') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->extra_fee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receiptVoucher.fields.total_amount') }}
                        </th>
                        <td>
                            {{ $receiptVoucher->total_amount }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.receipt-vouchers.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
