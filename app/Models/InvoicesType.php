<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoicesType extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'invoices_types';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'invoice_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
