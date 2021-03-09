<?php

namespace App\Http\Requests;

use App\Models\Invoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_create');
    }

    public function rules()
    {
        return [
            'inv_date'             => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'pay_type_id'          => [
                'required',
                'integer',
            ],
            'cus_name_id'          => [
                'required',
                'integer',
            ],
            'shipped_from'         => [
                'string',
                'required',
            ],
            'import_statement'     => [
                'string',
                'nullable',
            ],
            'import_statment_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'no_of_packages'       => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'pay_order_no'         => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'pay_order_date'       => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
