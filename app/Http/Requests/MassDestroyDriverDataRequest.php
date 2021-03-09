<?php

namespace App\Http\Requests;

use App\Models\DriverData;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDriverDataRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('driver_data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:driver_datas,id',
        ];
    }
}
