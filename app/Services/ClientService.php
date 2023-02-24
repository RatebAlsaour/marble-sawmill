<?php

namespace App\Services;

use App\Http\Resources\Admin\SupplierList;
use App\Models\Client;

class ClientService extends BaseService
{
    public function __construct(Client $client)
    {
        $this->model = $client;
    }

    /**
     * This function will be used to fetch clients and prepare the result set for the admin panel
     * @return mixed
     */
    public function getClientsForDatatable()
    {
        $query = $this->getQuery();
        $clients = $query->get();

        return $clients->map(function($client) {
            return (new \App\Http\Resources\Admin\Client($client))->toArray(null);
        });
    }
           // Return clients as list
    public function getList()
    {
        $query = $this->getQuery();
        $clients = $query->get();
        return SupplierList::collection($clients)->toArray(null);
    }
}
