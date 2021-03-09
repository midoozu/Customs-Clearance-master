<?php

namespace App\Http\Requests;
use App\Models\ShippingAndClearance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShippingAndClearanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipping_and_clearance_create');
    }

    public function rules()
    {
        return [
            'customer_name_id'              => [
                'required',
                'integer',
            ],
            'int_order_no'                  => [
                'alpha_dash',
                'nullable',
                'min:-2147483648',
                'max:2147483647',
            ],
            'supplier_invoice_number'       => [
                'alpha_dash',
                'nullable',
                'min:-2147483648',
                'max:2147483647',
            ],
            'supplier_name'                 => [
                'string',
                'required',
            ],
            'shipping_policy_number'        => [
                'alpha_dash',
                'nullable',
                'min:-2147483648',
                'max:2147483647',
            ],
            'transaction_number'            => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'transaction_date'              => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'arrival_date'                  => [
                'required',
                'date_format:' . config('panel.date_format') ,
            ],
            'ship_name'                     => [
                'string',
                'nullable',
            ],
            'discharge_company'             => [
                'string',
                'required',
            ],
            'authorization_delivery_number' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'authorization_date'            => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'statement_number'              => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'statement_date'                => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'shipment_type'                 => [
                'string',
                'nullable',
            ],
            'container_partial_wight'       => [
                'numeric',
            ],
            'first_latter'       => [
                'required',
            ],

            'sec_latter'       => [
                'required',
            ],
            'third_latter'       => [
                'required',
            ],
            'forth_letter'       => [
                'required',
            ],
            'st_number'       => [
                'required',
                'min:0',
                'max:9',
            ],
            'sec_number'       => [
                'required',
                'min:0',
                'max:9',
            ], 'third_number'       => [
                'required',
                'min:0',
                'max:9',
            ],
            'forth_number'       => [
                'required',
                'min:0',
                'max:9',
            ],
            'fifth_number'       => [
                'required',
                'min:0',
                'max:9',
            ],
            'sixth_number'       => [
                'required',
                'min:0',
                'max:9',
            ],
            'seventh_number'       => [
                'required',
                'min:0',
                'max:9',
            ],


        ];
    }
}
