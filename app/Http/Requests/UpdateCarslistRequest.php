<?php

namespace App\Http\Requests;

use App\Models\Carslist;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCarslistRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('carslist_edit');
    }

    public function rules()
    {
        return [
            'car_type'  => [
                'string',
                'required',
            ],
            'car_plate' => [
                'string',
                'required',
            ],
        ];
    }
}
