<?php

namespace App\Services;

use App\Models\Cost;
use App\Http\Resources\Admin\Costs as AdminCostsResource;

class CostService extends BaseService
{

    public function __construct(protected Cost $cost)
    {
        $this->model = $cost;
    }

    public function getCostsForDatatable()
    {
        $query = $this->getQuery()->orderByDesc('id');
        $costs = $query->get();
        return $costs->map(function ($cost) {
            return (new AdminCostsResource($cost))->toArray(null);
        });
    }
}

