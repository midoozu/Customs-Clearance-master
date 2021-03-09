<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTypesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_type')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
