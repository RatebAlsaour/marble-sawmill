<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierInvoiceRequest extends FormRequest
{
    public function rules()
    {
        return [
            'supplier_id' => ['required', 'exists:suppliers,id'],
            'country_id' => ['required', 'exists:countries,id'],
            'currency_id' => ['required', 'exists:currencies,id'],
            'ship_cost' => 'required',
            'custom_cost' => 'required',
            'metric_type' => 'required',
            'amount' => 'required'
        ];
    }
}



