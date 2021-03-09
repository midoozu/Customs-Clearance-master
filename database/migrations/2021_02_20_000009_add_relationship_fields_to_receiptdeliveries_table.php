<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReceiptdeliveriesTable extends Migration
{
    public function up()
    {
        Schema::table('receiptdeliveries', function (Blueprint $table) {
            $table->unsignedBigInteger('driver_name_id');
            $table->foreign('driver_name_id', 'driver_name_fk_3232753')->references('id')->on('driver_datas');
            $table->unsignedBigInteger('car_plate_id')->nullable();
            $table->foreign('car_plate_id', 'car_plate_fk_3232754')->references('id')->on('carslists');
        });
    }
}
