<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptVouchersTable extends Migration
{
    public function up()
    {
        Schema::create('receipt_vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cus_acc_number');
            $table->string('cus_name')->nullable();
            $table->date('trx_date');
            $table->string('cons_name');
            $table->integer('bl_no');
            $table->date('eta_date');
            $table->string('ship_name');
            $table->date('arrival_date');
            $table->string('discharge_company');
            $table->integer('authorization_number');
            $table->date('authorization_date');
            $table->integer('statement_number');
            $table->date('statement_date');
            $table->date('delivery_date');
            $table->float('container_partial_wight', 5, 2)->nullable();
            $table->decimal('shipment_fee', 15, 2);
            $table->decimal('extra_fee', 15, 2)->nullable();
            $table->decimal('total_amount', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
