<?php

namespace App\Http\Requests;

use App\Models\ReceiptVoucher;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReceiptVoucherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('receipt_voucher_edit');
    }

    public function rules()
    {
        return [
            'cus_acc_number'          => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'cus_name'                => [
                'string',
                'nullable',
            ],
            'trx_date'                => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'cons_name'               => [
                'string',
                'required',
            ],
            'bl_no'                   => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'eta_date'                => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'ship_name'               => [
                'string',
                'required',
            ],
            'arrival_date'            => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'discharge_company'       => [
                'string',
                'required',
            ],
            'authorization_number'    => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'authorization_date'      => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'statement_number'        => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'statement_date'          => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'delivery_date'           => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'container_partial_wight' => [
                'numeric',
            ],
            'shipment_fee'            => [
                'required',
            ],
        ];
    }
}
