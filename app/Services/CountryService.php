<?php

namespace App\Services;

use App\Http\Resources\Admin\CountryList;
use App\Models\Country;
use App\Http\Resources\Admin\country as AdminCountryResource;

use function PHPSTORM_META\map;

class CountryService extends BaseService
{

    public function __construct(protected Country $country)
    {
        $this->model = $country;
    }

    public function getcountriesForDatatable()
    {
        $query = $this->getQuery()->orderByDesc('created_at');
        $countries = $query->get();
        return $countries->map(function ($country) {
            return (new AdminCountryResource($country))->toArray(null);
        });
    }
    public function getList()
    {
        $query = $this->getQuery();
        $countries = $query->get();
        return CountryList::collection($countries)->toArray(null);
    }
}
