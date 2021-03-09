<?php

namespace App\Http\Requests;

use App\Models\InvoiceTranslate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInvoiceTranslateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_translate_create');
    }

    public function rules()
    {
        return [
            'arabic_desc.*'           => [
                'string',
                'required',
            ],
            'en_desc.*'               => [
                'string',
                'required',
            ],

            'currency'              => [
                'string',
                'required',
            ],
            'quantity.*'              => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'manufacturing_country.*' => [
                'string',
                'required',
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
            'invoice_type'       => [
                'required',
                'string',
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


            'hscode.*'          => [
                'required',
                'numeric',
                'digits:12',
            ],
        ];
    }
}
