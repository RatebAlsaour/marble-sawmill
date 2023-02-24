<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Traits\MessageHandleHelper;
use App\Http\Controllers\BaseController;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Services\ClientService;

class ClientController extends BaseController
{
    use MessageHandleHelper;

    public function __construct(private Request $request, private ClientService $clientService) {
        parent::__construct($request);
    }

    public function index()
    {
        if ($this->request->ajax()) {
            $users = $this->clientService->getClientsForDatatable();
            return prepareDataTable($users, 'clients');
        }

        return view('pages.user.client.index');
    }

    public function edit(Client $client)
    {
        return view('pages.user.client.update', [
            'user' => $client->user
        ]);
    }

    public function destroy($id)
    {
        $this->clientService->destroy($id);
        return $this->successResponse();
    }
}
