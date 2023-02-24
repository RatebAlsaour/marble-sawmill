<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierInvoiceDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'supplier_invoice_id' => $this->resource->supplier_invoice->id,
            'block_symbol' => $this->resource->block_symbol,
            'high' => $this->resource->high,
            'weight' => $this->resource->weight,
            'width' => $this->resource->width,
            'height' => $this->resource->height,
            'created_at' => $this->resource->created_at ? $this->resource->created_at->format('Y-m-d') : '',
        ];
    }
}
