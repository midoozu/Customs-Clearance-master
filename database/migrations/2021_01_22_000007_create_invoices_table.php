<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('inv_date')->nullable();
            $table->string('shipped_from');
            $table->string('import_statement')->nullable();
            $table->date('import_statment_date')->nullable();
            $table->integer('no_of_packages');
            $table->integer('pay_order_no')->nullable();
            $table->date('pay_order_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
