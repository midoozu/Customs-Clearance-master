<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToShippingAndClearancesTable extends Migration
{
    public function up()
    {
        Schema::table('shipping_and_clearances', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_name_id');
            $table->foreign('customer_name_id', 'customer_name_fk_2979265')->references('id')->on('clients');
        });
    }
}
