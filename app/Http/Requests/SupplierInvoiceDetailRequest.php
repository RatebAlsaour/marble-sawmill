<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierInvoiceDetailRequest extends FormRequest
{
    public function rules()
    {
        return [
            'supplier_invoice_id' => ['required', 'exists:supplier_invoices,id'],
            'height' => 'required',
            'weight' => 'required',
            'width' => 'required',
            'high' => 'required',
        ];
    }
}



