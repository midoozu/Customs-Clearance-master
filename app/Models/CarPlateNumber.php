<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\False_;

class CarPlateNumber extends Model
{
    protected $table= 'car_plate_number';

    protected $fillable =[

        'first_latter',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
public $timestamps =False;
}
