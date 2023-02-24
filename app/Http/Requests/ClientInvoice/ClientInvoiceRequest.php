<?php

namespace App\Http\Requests\ClientInvoice;

use Illuminate\Foundation\Http\FormRequest;

class ClientInvoiceRequest extends FormRequest
{
    public function rules()
    {
        return [
            'client_id' => ['required', 'exists:clients,id'],
            'category_id' => ['required', 'exists:categories,id']
        ];
    }
}
