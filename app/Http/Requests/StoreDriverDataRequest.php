<?php

namespace App\Http\Requests;

use App\Models\DriverData;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDriverDataRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('driver_data_create');
    }

    public function rules()
    {
        return [
            'name'      => [
                'string',
                'required',
            ],
            'driver_no' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
