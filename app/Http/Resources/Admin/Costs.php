<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class Costs extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'type' => $this->resource->type,
            'cost' => $this->resource->cost,
        ];
    }
}
