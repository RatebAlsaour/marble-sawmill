<?php

namespace App\Http\Requests\Cost;

use Illuminate\Foundation\Http\FormRequest;

class CostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'cost' => 'required',
            'type' => 'required'
        ];
    }
}
