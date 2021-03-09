<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use \DateTimeInterface;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;




class ReceiptVoucher extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $appends = [
        'docs',
    ];

    public $table = 'receipt_vouchers';

    protected $dates = [
        'trx_date',
        'eta_date',
        'arrival_date',
        'authorization_date',
        'statement_date',
        'delivery_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cus_acc_number',
        'cus_name',
        'trx_date',
        'cons_name',
        'bl_no',
        'eta_date',
        'ship_name',
        'arrival_date',
        'discharge_company',
        'authorization_number',
        'authorization_date',
        'statement_number',
        'statement_date',
        'delivery_date',
        'container_partial_wight',
        'shipment_fee',
        'extra_fee',
        'total_amount',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

//    public function registerMediaConversions(Media $media = null)
//    {
//        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
//        $this->addMediaConversion('preview')->fit('crop', 120, 120);
//    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
       $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }



    public function getTrxDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTrxDateAttribute($value)
    {
        $this->attributes['trx_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEtaDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEtaDateAttribute($value)
    {
        $this->attributes['eta_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
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

    public function getDeliveryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDeliveryDateAttribute($value)
    {
        $this->attributes['delivery_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDocsAttribute()
    {
        return $this->getMedia('docs');
    }

    public function invoice_translate(){

        return $this->hasMany(InvoiceTranslate::class, 'invoice_translate_id');

    }
}
