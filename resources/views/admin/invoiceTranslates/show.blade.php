@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.invoiceTranslate.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.invoice-translates.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.id') }}
                        </th>
                        <td>
                            {{ $invoiceTranslate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.arabic_desc') }}
                        </th>
                        <td>
                            {{ $invoiceTranslate->arabic_desc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.en_desc') }}
                        </th>
                        <td>
                            {{ $invoiceTranslate->en_desc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.customs_item') }}
                        </th>
                        <td>
                            {{ $invoiceTranslate->customs_item }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.currency') }}
                        </th>
                        <td>
                            {{ $invoiceTranslate->currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.quantity') }}
                        </th>
                        <td>
                            {{ $invoiceTranslate->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.manufacturing_country') }}
                        </th>
                        <td>
                            {{ $invoiceTranslate->manufacturing_country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.transaction_number') }}
                        </th>
                        <td>
                            {{ $invoiceTranslate->transaction_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.invoice_number') }}
                        </th>
                        <td>
                            {{ $invoiceTranslate->invoice_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.invoice_date') }}
                        </th>
                        <td>
                            {{ $invoiceTranslate->invoice_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.invoice_type') }}
                        </th>
                        <td>
                            {{ $invoiceTranslate->invoice_type->invoice_type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.saber_number') }}
                        </th>
                        <td>
                            {{ $invoiceTranslate->saber_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.exemption_number') }}
                        </th>
                        <td>
                            {{ $invoiceTranslate->exemption_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceTranslate.fields.shipment_fee') }}
                        </th>
                        <td>
                            {{ $invoiceTranslate->shipment_fee }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.invoice-translates.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
