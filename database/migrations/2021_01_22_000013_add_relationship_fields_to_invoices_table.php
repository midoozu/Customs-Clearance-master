<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInvoicesTable extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedBigInteger('trx_number_id')->nullable();
            $table->foreign('trx_number_id', 'trx_number_fk_3042364')->references('id')->on('shipping_and_clearances');
            $table->unsignedBigInteger('inv_type_id')->nullable();
            $table->foreign('inv_type_id', 'inv_type_fk_3042486')->references('id')->on('invoices_types');
            $table->unsignedBigInteger('pay_type_id');
            $table->foreign('pay_type_id', 'pay_type_fk_3042487')->references('id')->on('payment_types');
            $table->unsignedBigInteger('cus_name_id');
            $table->foreign('cus_name_id', 'cus_name_fk_3042488')->references('id')->on('clients');
            $table->unsignedBigInteger('ship_name_id')->nullable();
            $table->foreign('ship_name_id', 'ship_name_fk_3042489')->references('id')->on('shipping_and_clearances');
        });
    }
}
