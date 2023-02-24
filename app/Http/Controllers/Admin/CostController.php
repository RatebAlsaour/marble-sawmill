<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Cost\CostRequest;
use Illuminate\Http\Request;
use App\Models\Cost;
use App\Services\CostService;

class  CostController extends BaseController
{
    public function __construct(private Request $request, private CostService $costService)
    {
        parent::__construct($request);
    }
           // View Costs
    public function index()
    {
        if ($this->request->ajax()) {
            $cost = $this->costService->getCostsForDatatable();
            return prepareDataTable($cost, 'costs');
        }
        return view('pages.cost.index');
    }
         // insert Cost
    public function store(CostRequest $request)
    {
        $this->costService->create($request->validated());
    }
        //Edit cost By ID
    public function edit(Cost $cost)
    {
        return view('pages.cost.update', [
            'cost' => $cost,
        ]);
    }
    public function update(CostRequest $request,Cost $cost)
    {
       $this->costService->updateModel($cost,$request->validated());
        return redirect()->to(route('costs.index'));
    }
    //Delete cost by ID
    public function destroy($id)
    {
         $this->costService->destroy($id);
    }
}
