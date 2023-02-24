<?php

namespace App\Services;

use App\Http\Resources\Admin\CurrencyList;
use App\Http\Resources\Currency as AdminCurrenciesResource;
use App\Models\Currency;

class CurrencyService extends BaseService
{

    public function __construct(protected Currency $currency)
    {
        $this->model = $currency;
    }

    public function getCurrenciesForDatatable()
    {
        $query = $this->getQuery()->orderByDesc('id');
        $currencies = $query->get();
        return $currencies->map(function ($currency) {
            return (new AdminCurrenciesResource($currency))->toArray(null);
        });
    }
    public function getList()
    {
        $query = $this->getQuery();
        $currencies = $query->get();
        return  CurrencyList::collection($currencies)->toArray(null);
    }
}
