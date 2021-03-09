<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice_service extends Model
{
    protected $table='invoice_service';

    protected $fillable = [

        'invoice_id',
        'service_id' ,
        'amount',
        'tax_percentage',
        'tax_amount',
        'total',



    ];
}
