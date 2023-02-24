<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClientInvoice;
use App\Models\Country;
use App\Models\Supplier;
use App\Models\SupplierInvoice;
use App\Http\Controllers\BaseController;
use App\Services\CurrencyService;
use App\Services\supplierInvoiceService;
use App\Http\Requests\SupplierInvoiceRequest;
use Illuminate\Http\Request;
use App\Services\SupplierService;
use App\Services\CountryService;




class SupplierInvoiceController extends BaseController
{


        public function __construct(private Request $request, private supplierInvoiceService $supplierInvoiceService,private Supplier $supplier,SupplierInvoice $supplierInv,private SupplierService $supplierService,private CountryService $countryService,private CurrencyService $currencyService)
        {
            parent::__construct($request);
        }
    // View supplier_invoice
    public function index()
    {
        if ($this->request->ajax()) {
            $supplierInv = $this->supplierInvoiceService->getDataForDatatable();
            return prepareDataTable($supplierInv, 'supplier-invoices');
        }
        return view('pages.supplier_invoice.index',
            [
                'suppliers'=>$this->supplierService->getList(),
                'currencies' => $this->currencyService->getList(),
                'countries'=>$this->countryService->getList(),
            ]);
    }
    // insert categories
    public function store(SupplierInvoiceRequest $request)
    {
        $this->supplierInvoiceService->create($request->validated());
    }
    // Edit supplierInvoice By ID
    public function edit(SupplierInvoice $supplierInvoice)
    {
        return view('pages.supplier_invoice.update', [
            'supplierInvoice' => $supplierInvoice,
            'suppliers'=>$this->supplierService->getList(),
            'countries'=>$this->countryService->getList(),
            'currencies' => $this->currencyService->getList(),

        ]);

    }

    public function update(SupplierInvoiceRequest $request,SupplierInvoice $supplierInvoice)
    {
        $this->supplierInvoiceService->updateModel($supplierInvoice,$request->validated());
        return redirect()->to(route('supplier-invoices.index'));
    }
    //Delete supplierInvoice by ID
    public function destroy($id)
    {
        $this->supplierInvoiceService->destroy($id);
    }
}
