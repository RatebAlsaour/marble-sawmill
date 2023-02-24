<?php

namespace App\Services;

use App\Models\SupplierInvoice;
use App\Http\Resources\Admin\SupplierInvoice as AdminSupplierInvoiceResource;



class SupplierInvoiceService extends BaseService
{

    public function __construct(protected SupplierInvoice $supplierInvoice)
    {
        parent::__construct($supplierInvoice);
    }
    protected $relations = [
        "country","supplier.user","currency"
    ];

}
