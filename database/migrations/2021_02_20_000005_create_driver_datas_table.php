<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverDatasTable extends Migration
{
    public function up()
    {
        Schema::create('driver_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('driver_no');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
