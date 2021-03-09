<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTranslatesTable extends Migration
{
    public function up()
    {
        Schema::create('invoice_translates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('arabic_desc');
            $table->string('en_desc');
            $table->string('customs_item');
            $table->string('currency');
            $table->integer('quantity');
            $table->string('manufacturing_country');
            $table->integer('transaction_number');
            $table->integer('invoice_number');
            $table->date('invoice_date');
            $table->integer('saber_number');
            $table->integer('exemption_number');
            $table->decimal('shipment_fee', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
