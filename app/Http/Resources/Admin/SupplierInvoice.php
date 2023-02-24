<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierInvoice extends JsonResource
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
            'supplier_name' => $this->resource->supplier->user->name,
            'country_name' => $this->resource->country->name,
            'custom_cost' => $this->resource->custom_cost,
            'ship_cost' => $this->resource->ship_cost,
            'metric_type' => $this->resource->metric_type,
            'currency_name' => $this->resource->currency->name,
            'amount' => $this->resource->amount,
            'created_at' => $this->resource->created_at ? $this->resource->created_at->format('Y-m-d') : '',
        ];
    }
}
