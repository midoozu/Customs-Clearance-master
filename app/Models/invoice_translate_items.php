<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice_translate_items extends Model
{
    use HasFactory;


    protected $table ='invoice_translate_items';
    protected $fillable = [

         'arabic_desc', 'en_desc', 'quantity', 'unit', 'hscode', 'amount', 'manufacturing_country', 'invoice_translate_id'

    ];

    public function invoice_translate(){

        return $this->belongsTo(InvoiceTranslate::class, 'invoice_translate_id');

    }



}
