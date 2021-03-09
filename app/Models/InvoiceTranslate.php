<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceTranslate extends Model
{
    use SoftDeletes;

    public $table = 'invoice_translates';

    protected $dates = [
        'invoice_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
         'currency', 'invoice_number', 'invoice_date', 'saber_number', 'exemption_number', 'shipment_fee', 'invoice_type',
        'receipt_voucher_id', 'invoice_no',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getInvoiceDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInvoiceDateAttribute($value)
    {
        $this->attributes['invoice_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function invoice_translate_items()
    {
        return $this->belongsTo(invoice_translate_items::class, 'invoice_translate_id');
    }
    public function receipt_voucher()
    {
        return $this->belongsTo(ReceiptVoucher::class, 'receipt_voucher_id');
    }


}
