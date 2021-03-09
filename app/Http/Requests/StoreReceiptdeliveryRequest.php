<?php

namespace App\Http\Requests;

use App\Models\Receiptdelivery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReceiptdeliveryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('receiptdelivery_create');
    }

    public function rules()
    {
        return [
            'cus_name'          => [
                'string',
                'required',
            ],
            'cus_acc_number'    => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'recipient'         => [
                'string',
                'required',
            ],
            'recipient_address' => [
                'required',
            ],
            'contact'           => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'sec_contact'       => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'file_number'       => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'p_p_no'            => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'eta_date'          => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'policy_no'         => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ship_name'         => [
                'string',
                'required',
            ],
            'driver_name_id'    => [
                'required',
                'integer',
            ],
            'leave_date'        => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
