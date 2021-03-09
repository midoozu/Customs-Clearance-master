<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table='service';
    protected $fillable=[

         'servicename', 'amount', 'tax_percentage', 'tax_amount', 'total',
        ];

    protected $dates=[


        'created_at', 'updated_at', 'deleted_at'
    ];
}
