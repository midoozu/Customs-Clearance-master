<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingAndClearancesTable extends Migration
{
    public function up()
    {
        Schema::create('shipping_and_clearances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('int_order_no');
            $table->integer('supplier_invoice_number');
            $table->string('supplier_name');
            $table->integer('shipping_policy_number');
            $table->integer('transaction_number')->nullable();
            $table->date('transaction_date');
            $table->datetime('arrival_date');
            $table->string('ship_name')->nullable();
            $table->string('discharge_company');
            $table->integer('authorization_delivery_number')->nullable();
            $table->date('authorization_date');
            $table->integer('statement_number')->nullable();
            $table->date('statement_date')->nullable();
            $table->string('shipment_type')->nullable();
            $table->float('container_partial_wight', 15, 2)->nullable();
            $table->decimal('shipment_fees', 15, 2)->nullable();
            $table->decimal('policy_replacement_fee', 15, 2)->nullable();
            $table->decimal('extra_fees', 15, 2)->nullable();
            $table->decimal('total_amount', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
