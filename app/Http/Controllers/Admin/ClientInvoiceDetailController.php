<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\ClientInvoiceDetail;
use App\Models\ClientInvoice;
use Illuminate\Http\Request;
use App\Http\Requests\ClientInvoiceDetails\ClientInvoiceDetailRequest;
use App\Services\ClientInvoiceDetailService;
use App\Services\ClientInvoiceService;

class ClientInvoiceDetailController extends BaseController
{
    public function __construct(private Request $request,private ClientInvoiceDetail $clientInv,private ClientInvoiceDetailService $clientInvoiceDatilsService,private ClientInvoiceService $clientInvoiceService,private ClientInvoice $clientInvoice)
    {
        parent::__construct($request);
    }

    public function index(ClientInvoice $clientInvoice)
    {
        if ($this->request->ajax()) {
       $clientInv = $this->clientInvoiceDatilsService->getCostsForDatatable();
       $invoiceId=$clientInvoice->id;
            return prepareDataTable($clientInv,"client-invoices/$invoiceId/client-invoice-details");
        }
        return view('pages.client_invoice.details.index');
    }

    public function store(ClientInvoiceDetailRequest $request,ClientInvoice $clientInvoic)
    {
        $res=array_merge($request,$clientInvoic->id);
        $this->clientInvoiceDatilsService->create($res->validated());
    }

    public function edit(ClientInvoice $clientInvoice,ClientInvoiceDetail $clientInvoiceDetail)
    {
        return view('pages.client_invoice.details.update',[
            'clientInvoiceDetail' => $clientInvoiceDetail,
            'clientInvoice'=>$clientInvoice
        ]);
    }

    public function update(ClientInvoiceDetailRequest $request,ClientInvoiceDetail $clientInvoiceDetail,ClientInvoice $clientInvoic)
    {
     $res=array_merge($request,$clientInvoic->id);
       dd($res);
        $this->clientInvoiceDatilsService->updateModel($clientInvoiceDetail,$res->validated());
        return redirect()->to(route('client-invoice-details.index',['clientInvoice'=>$clientInvoic->id]));
    }

    public function destroy($id)
    {
        $this->clientInvoiceDatilsService->destroy($id);

    }
}
