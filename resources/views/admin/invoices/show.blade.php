@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.invoice.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.invoices.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.id') }}
                        </th>
                        <td>
                            {{ $invoice->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.trx_number') }}
                        </th>
                        <td>
                            {{ $invoice->trx_number->transaction_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.inv_date') }}
                        </th>
                        <td>
                            {{ $invoice->inv_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.inv_type') }}
                        </th>
                        <td>
                            {{ $invoice->inv_type->invoice_type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.pay_type') }}
                        </th>
                        <td>
                            {{ $invoice->pay_type->payment_type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.cus_name') }}
                        </th>
                        <td>
                            {{ $invoice->cus_name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.ship_name') }}
                        </th>
                        <td>
                            {{ $invoice->ship_name->ship_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.shipped_from') }}
                        </th>
                        <td>
                            {{ $invoice->shipped_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.import_statement') }}
                        </th>
                        <td>
                            {{ $invoice->import_statement }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.import_statment_date') }}
                        </th>
                        <td>
                            {{ $invoice->import_statment_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.no_of_packages') }}
                        </th>
                        <td>
                            {{ $invoice->no_of_packages }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.pay_order_no') }}
                        </th>
                        <td>
                            {{ $invoice->pay_order_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.pay_order_date') }}
                        </th>
                        <td>
                            {{ $invoice->pay_order_date }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.invoices.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
