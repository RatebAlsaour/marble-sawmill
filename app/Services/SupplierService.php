<?php

namespace App\Services;

use App\Http\Resources\Admin\Supplier as AdminSupplierResource;
use App\Http\Resources\Admin\SupplierList;
use App\Models\Supplier;

class SupplierService extends BaseService
{
    public function __construct(Supplier $supplier)
    {
        $this->model = $supplier;
    }

    protected $relations = [
        'user'
    ];

    /**
     * This function will be used to fetch suppliers and prepare the result set for the admin panel
     * @return mixed
     */
    public function getSuppliersForDatatable()
    {
        $query = $this->getQuery()
            ->orderByDesc('id');
        $suppliers = $query->get();
        return AdminSupplierResource::collection($suppliers)->toArray(null);
    }
    public function getList()
    {
        $query = $this->getQuery();
        $suppliers = $query->get();
        return SupplierList::collection($suppliers)->toArray(null);
    }
}
