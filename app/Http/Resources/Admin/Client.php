<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class Client extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'status' => $this->resource->user->status,
            'name' => $this->resource->user->name,
            'email' => $this->resource->user->email,
            'mobile' => $this->resource->user->mobile,
            'created_at' => $this->resource->user->created_at ? $this->resource->user->created_at->format('Y-m-d') : '',
        ];
    }
}
