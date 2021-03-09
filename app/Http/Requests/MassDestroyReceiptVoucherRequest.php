<?php

namespace App\Http\Requests;

use App\Models\ReceiptVoucher;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReceiptVoucherRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('receipt_voucher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:receipt_vouchers,id',
        ];
    }
}
