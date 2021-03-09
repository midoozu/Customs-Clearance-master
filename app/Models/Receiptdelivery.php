<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Receiptdelivery extends Model
{
    use SoftDeletes;

    public $table = 'receiptdeliveries';

    const STATUS_SELECT = [
        '1' => 'قيد التوصيل',
        '2' => 'تم التسليم',
    ];

    protected $dates = [
        'eta_date',
        'leave_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cus_name',
        'cus_acc_number',
        'recipient',
        'recipient_address',
        'contact',
        'sec_contact',
        'file_number',
        'p_p_no',
        'eta_date',
        'policy_no',
        'ship_name',
        'driver_name_id',
        'car_plate_id',
        'leave_date',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getEtaDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEtaDateAttribute($value)
    {
        $this->attributes['eta_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function driver_name()
    {
        return $this->belongsTo(DriverData::class, 'driver_name_id');
    }

    public function car_plate()
    {
        return $this->belongsTo(Carslist::class, 'car_plate_id');
    }

    public function getLeaveDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setLeaveDateAttribute($value)
    {
        $this->attributes['leave_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
