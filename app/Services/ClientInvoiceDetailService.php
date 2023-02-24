<?php

namespace App\Services;

use App\Http\Resources\Admin\ClientInvoiceDetil as AdminClientInvoicesResource ;
use App\Models\ClientInvoiceDetail;

class ClientInvoiceDetailService extends BaseService
{

    public function __construct(protected ClientInvoiceDetail $clientInvoiceDetail)
    {
         parent::__construct($clientInvoiceDetail);
    }

    protected $relations = [
        'clientInvoice'
      ];


    public function getCostsForDatatable()
    {
        $query = $this->getQuery()->orderByDesc('id');
        $categories = $query->get();

        return $categories->map(function ($cgategory) {
            return (new AdminClientInvoicesResource($cgategory))->toArray(null);
        });
    }

}
