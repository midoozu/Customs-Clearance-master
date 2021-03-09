<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Carslist extends Model
{
    use SoftDeletes;

    public $table = 'carslists';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'car_type',
        'car_plate',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function carPlateReceiptdeliveries()
    {
        return $this->hasMany(Receiptdelivery::class, 'car_plate_id', 'id');
    }
}
