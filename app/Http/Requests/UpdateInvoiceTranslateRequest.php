<?php

namespace App\Http\Requests;

use App\Models\InvoiceTranslate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInvoiceTranslateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_translate_edit');
    }

    public function rules()
    {
        return [
            'arabic_desc'           => [
                'string',
                'required',
            ],
            'en_desc'               => [
                'string',
                'required',
            ],
            'customs_item'          => [
                'string',
                'required',
            ],
            'currency'              => [
                'string',
                'required',
            ],
            'quantity'              => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'manufacturing_country' => [
                'string',
                'required',
            ],
            'transaction_number'    => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'invoice_number'        => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'invoice_date'          => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'invoice_type_id'       => [
                'required',
                'integer',
            ],
            'saber_number'          => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'exemption_number'      => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'shipment_fee'          => [
                'required',
            ],
        ];
    }
}
