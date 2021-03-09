<?php

namespace App\Http\Requests;

use App\Models\InvoicesType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInvoicesTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoices_type_edit');
    }

    public function rules()
    {
        return [
            'invoice_type' => [
                'string',
                'required',
                'unique:invoices_types,invoice_type,' . request()->route('invoices_type')->id,
            ],
        ];
    }
}
