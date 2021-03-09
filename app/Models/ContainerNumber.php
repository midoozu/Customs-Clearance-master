<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\False_;


class ContainerNumber extends Model
{
    protected $table= 'car_plate_number';

    protected $fillable =[

        'first_latter',
         'sec_letter',
        'third_letter',
        'forth_letter',
        'st_number',
        'sec_number',
        'third_number',
        'forth_number',
        'fifth_number',
        'sixth_number',
        'seventh_number',
        'eight_number',
        'clearance_id',
        'con_size',




    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
