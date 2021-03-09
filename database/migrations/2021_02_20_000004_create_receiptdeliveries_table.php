<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptdeliveriesTable extends Migration
{
    public function up()
    {
        Schema::create('receiptdeliveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cus_name');
            $table->integer('cus_acc_number');
            $table->string('recipient');
            $table->longText('recipient_address');
            $table->integer('contact');
            $table->integer('sec_contact')->nullable();
            $table->integer('file_number');
            $table->integer('p_p_no');
            $table->date('eta_date');
            $table->integer('policy_no');
            $table->string('ship_name');
            $table->date('leave_date');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
