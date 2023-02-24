<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierInvoice extends model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id','country_id','currency_id','custom_cost','ship_cost','metric_type','amount',
        ];
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function currency(){
        return $this->belongsTo(Currency::class);
    }
    public function details(){
        return $this->hasMany(SupplierInvoiceDetail::class);
    }

}
