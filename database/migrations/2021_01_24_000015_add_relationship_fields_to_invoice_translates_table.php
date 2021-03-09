<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInvoiceTranslatesTable extends Migration
{
    public function up()
    {
        Schema::table('invoice_translates', function (Blueprint $table) {
            $table->unsignedBigInteger('invoice_type_id');
            $table->foreign('invoice_type_id', 'invoice_type_fk_3052331')->references('id')->on('invoices_types');
        });
    }
}
