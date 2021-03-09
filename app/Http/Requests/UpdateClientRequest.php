<?php

namespace App\Http\Requests;

use App\Models\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_edit');
    }

    public function rules()
    {
        return [
            'name'       => [
                'string',
                'required',
                'unique:clients,name,' . request()->route('client')->id,
            ],
            'phone'      => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'acc_number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'city'       => [
                'string',
                'nullable',
            ],
            'address'    => [
                'string',
                'nullable',
            ],
            'area'       => [
                'string',
                'nullable',
            ],
        ];
    }
}
