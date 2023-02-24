<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Traits\MessageHandleHelper;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Country\CountryRequest;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Services\CountryService;
use Illuminate\Http\Response;

class  CountryController extends BaseController
{
    use MessageHandleHelper;
    public function __construct(private Request $request, private CountryService $countryService)
    {
        parent::__construct($request);
    }

    public function index()
    {
        if ($this->request->ajax()) {
            $country = $this->countryService->getcountriesForDatatable();
            return prepareDataTable($country, 'countries');
        }

        return view('pages.country.index');
    }

    public function store(CountryRequest $request)
    {
            $this->countryService->create($request->validated());
            return \response(null,200);
    }

    public function edit($id)
    {
        $country = $this->countryService->findOrFail($id);
        return view('pages.country.update', [
            'country' => $country,
        ]);
    }
}
