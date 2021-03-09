<?php

namespace App\Http\Requests;

use App\Models\InvoicesType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyInvoicesTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('invoices_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:invoices_types,id',
        ];
    }
}
