<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientInvoice extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name_client' => $this->resource->client->user->name,
            'name_category' => $this->resource->category->name
        ];
    }
}
