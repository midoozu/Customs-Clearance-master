<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarslistsTable extends Migration
{
    public function up()
    {
        Schema::create('carslists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('car_type');
            $table->string('car_plate');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
