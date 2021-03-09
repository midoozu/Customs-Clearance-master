<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'invoices';

    protected $dates = [
        'inv_date',
        'import_statment_date',
        'pay_order_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'trx_number_id',
        'inv_date',
        'inv_type_id',
        'pay_type_id',
        'cus_name_id',
        'ship_name_id',
        'shipped_from',
        'import_statement',
        'import_statment_date',
        'no_of_packages',
        'pay_order_no',
        'pay_order_date',
        'created_at',
        'updated_at',
        'deleted_at',
        'total_before_tax',
        'total_discount',
        'total_tax',
        'invoice_amount',
    ];

    public function trx_number()
    {
        return $this->belongsTo(ShippingAndClearance::class, 'trx_number_id');
    }

    public function getInvDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInvDateAttribute($value)
    {
        $this->attributes['inv_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function inv_type()
    {
        return $this->belongsTo(InvoicesType::class, 'inv_type_id');
    }

    public function pay_type()
    {
        return $this->belongsTo(PaymentType::class, 'pay_type_id');
    }

    public function cus_name()
    {
        return $this->belongsTo(Client::class, 'cus_name_id');
    }

    public function ship_name()
    {
        return $this->belongsTo(ShippingAndClearance::class, 'ship_name_id');
    }

    public function getImportStatmentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setImportStatmentDateAttribute($value)
    {
        $this->attributes['import_statment_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPayOrderDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPayOrderDateAttribute($value)
    {
        $this->attributes['pay_order_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function Services()
    {

        return $this->belongsToMany(Service::class);
    }
}
