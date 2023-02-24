<?php

namespace App\Http\Requests\ClientInvoiceDetails;

use Illuminate\Foundation\Http\FormRequest;

class ClientInvoiceDetailRequest extends FormRequest
{

    public function rules()
    {
        return [
            'block_symbol'=>'required',
            'height'=>'required',
            'width'=>'required',
            'high'=>'required'

        ];
    }
}
