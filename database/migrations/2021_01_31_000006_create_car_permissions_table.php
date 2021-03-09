<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarPermissionsTable extends Migration
{
    public function up()
    {
        Schema::create('car_permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('file_number');
            $table->date('permission_date');
            $table->date('exit_date');
            $table->date('return_date');
            $table->string('truck_number');
            $table->string('car_type');
            $table->string('driver_name');
            $table->integer('driver_number');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
