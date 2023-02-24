<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\CurrencyRequest;
use App\Models\Currency;
use App\Services\CurrencyService;
use Illuminate\Http\Request;

class CurrencyController extends BaseController
{
    public function __construct(private Request $request, private CurrencyService $currencyService)
    {
        parent::__construct($request);
    }
          // View currencies
    public function index()
    {
        if ($this->request->ajax()) {
            $currency = $this->currencyService->getCurrenciesForDatatable();
            return prepareDataTable($currency, 'currencies');
        }
        return view('pages.currency.index');
    }
          // insert currencies
    public function store(CurrencyRequest $request)
    {
       $this->currencyService->create($request->validated());
    }
          // Edit currencies by ID
    public function edit(Currency $currency)
    {
        return view('pages.currency.update', [
            'currency' => $currency
        ]);
    }
    public function update(CurrencyRequest $request,Currency $currency)
    {
       $this->currencyService->updateModel($currency,$request->validated());
        return redirect()->to(route('currencies.index'));
    }
          //Delete currencies by ID
    public function destroy($id)
    {
         $this->currencyService->destroy($id);
    }
}
