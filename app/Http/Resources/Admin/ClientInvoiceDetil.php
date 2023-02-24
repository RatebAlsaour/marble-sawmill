<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientInvoiceDetil extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'clientInvoice_id'=>$this->resource->clientInvoice_id,
            'block_symbol'=>$this->resource->block_symbol,
            'hieght' => $this->resource->hieght,
            'width'=>$this->resource->width,
            'high'=>$this->resource->high
        ];
    }
}
