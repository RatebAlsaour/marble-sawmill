<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Traits\MessageHandleHelper;
use App\Http\Controllers\BaseController;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\SupplierService;

class SupplierController extends BaseController
{
    use MessageHandleHelper;

    public function __construct(private Request $request, private SupplierService $supplierService) {
        parent::__construct($request);
    }

    public function index()
    {
        if ($this->request->ajax()) {
            $users = $this->supplierService->getSuppliersForDatatable();
            return prepareDataTable($users, 'suppliers');
        }

        return view('pages.user.supplier.index');
    }

    public function edit(Supplier $supplier)
    {
        return view('pages.user.supplier.update', [
            'user' => $supplier->user
        ]);
    }

    public function certifyingToggle(Supplier $supplier)
    {
        $this->supplierService->certifyingToggle($supplier);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->supplierService->destroy($id);
        return $this->successResponse();
    }
}
