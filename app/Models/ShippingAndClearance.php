<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Models\TrxStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingAndClearance extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'shipping_and_clearances';

    protected $dates = [
        'transaction_date',
        'arrival_date',
        'authorization_date',
        'statement_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];



    protected $fillable = [
        'customer_name_id',
        'int_order_no',
        'supplier_invoice_number',
        'supplier_name',
        'shipping_policy_number',
        'transaction_number',
        'transaction_date',
        'arrival_date',
        'ship_name',
        'discharge_company',
        'authorization_delivery_number',
        'authorization_date',
        'statement_number',
        'statement_date',
        'shipment_type',
        'container_partial_wight',
        'shipment_fees',
        'policy_replacement_fee',
        'extra_fees',
        'total_amount',
        'created_at',
        'updated_at',
        'deleted_at',
        'trx_status_id',



    ];
    protected $casts = [
        'car_plate' => 'collection',
    ];

    public function customer_name()
    {
        return $this->belongsTo(Client::class, 'customer_name_id');
    }

    public function getTransactionDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTransactionDateAttribute($value)
    {
        $this->attributes['transaction_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getArrivalDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setArrivalDateAttribute($value)
    {

        $this->attributes['arrival_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getAuthorizationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAuthorizationDateAttribute($value)
    {
        $this->attributes['authorization_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getStatementDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStatementDateAttribute($value)
    {
        $this->attributes['statement_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
    public function trx_status()
    {
        return $this->belongsTo(TrxStatus::class, 'trx_status_id');
    }
}
