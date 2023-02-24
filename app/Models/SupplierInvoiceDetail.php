<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierInvoiceDetail extends Model
{
    use HasFactory;

    protected $fillable =[
        'supplier_invoice_id','block_symbol','height','width','high','quality',
    ];

    public function invoice(){
        return $this->belongsTo(SupplierInvoice::class);
    }
}
