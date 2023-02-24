<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\ClientInvoice;
use App\Models\Category;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\ClientInvoice\ClientInvoiceRequest;
use App\Services\ClientInvoiceService;
use App\Services\ClientService;
use App\Services\CategoryService;

class ClientInvoicesController extends BaseController
{

    public function __construct(private Request $request, private ClientInvoiceService $clientInvoicesService,ClientInvoice $clientInv,private Client $client,private Category $category,private ClientService $clientService,private CategoryService $categoryService)
    {
        parent::__construct($request);
    }

    public function index()
    {
        if ($this->request->ajax()) {
            $clientInv = $this->clientInvoicesService->getDataForDatatable();
            return prepareDataTable($clientInv, 'client-invoices');
        }
        return view('pages.client_invoice.index', [
            'clients'=>$this->clientService->getList(),
            'categories'=>$this->categoryService->getList()
        ]);
    }
    //Store clientInvoice
    public function store(ClientInvoiceRequest $request)
    {
        $this->clientInvoicesService->create($request->validated());
    }
     // Edit clientInvoice By ID
        public function edit(ClientInvoice $clientInvoice)
        {
            return view('pages.client_invoice.update', [
                'clientInvoice' => $clientInvoice,
                'clients'=>$this->clientService->getList(),
                'categories'=>$this->categoryService->getList()
            ]);
        }

        public function update(ClientInvoiceRequest $request,ClientInvoice $clientInvoice)
        {
            $this->clientInvoicesService->updateModel($clientInvoice,$request->validated());
            return redirect()->to(route('client-invoices.index'));
        }
        //Delete clientInvoice by ID
        public function destroy($id)
        {
            $this->clientInvoicesService->destroy($id);
        }

}
