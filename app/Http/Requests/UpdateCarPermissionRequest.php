<?php

namespace App\Http\Requests;

use App\Models\CarPermission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCarPermissionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('car_permission_edit');
    }

    public function rules()
    {
        return [
            'file_number'     => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'permission_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'exit_date'       => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'return_date'     => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'truck_number'    => [
                'string',
                'required',
            ],
            'car_type'        => [
                'string',
                'required',
            ],
            'driver_name'     => [
                'string',
                'required',
            ],
            'driver_number'   => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
