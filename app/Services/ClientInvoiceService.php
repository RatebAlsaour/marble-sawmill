<?php

namespace App\Services;

use App\Http\Resources\Admin\ClientInvoice as AdminClientInvoicesResource ;
use App\Models\ClientInvoice;

class ClientInvoiceService extends BaseService
{

    public function __construct(protected ClientInvoice $clientInvoice)
    {
         parent::__construct($clientInvoice);
    }

    protected $relations = [
      'client.user',
      'category'
    ];

    public function getList()
    {
        $query = $this->getQuery();
        $categories = $query->get();
        return AdminClientInvoicesResource::collection($categories)->toArray(null);
    }
}
