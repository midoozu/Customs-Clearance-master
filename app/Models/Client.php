<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'clients';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TYPE_RADIO = [
        'individual' => 'individual',
        'corporate'  => 'corporate',
    ];

    protected $fillable = [
        'name',
        'phone',
        'acc_number',
        'city',
        'address',
        'area',
        'email',
        'type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function customerNameShippingAndClearances()
    {
        return $this->hasMany(ShippingAndClearance::class, 'customer_name_id', 'id');
    }

    public function cusNameInvoices()
    {
        return $this->hasMany(Invoice::class, 'cus_name_id', 'id');
    }
}
