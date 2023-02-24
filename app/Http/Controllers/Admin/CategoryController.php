<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use App\Services\CategoryService;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends BaseController
{

    public function __construct(private Request $request, private CategoryService $categoryService)
    {
        parent::__construct($request);
    }
            // View category
    public function index()
    {
        if ($this->request->ajax()) {
            $category = $this->categoryService->getCostsForDatatable();
            return prepareDataTable($category, 'categories');
        }
        return view('pages.category.index');
    }
          // insert categories
    public function store(CategoryRequest $request)
    {
       $this->categoryService->create($request->validated());
    }
        //Edit category by ID
    public function edit(Category $category)
    {
        return view('pages.category.update', [
            'category' => $category,
        ]);
    }
    public function update(CategoryRequest $request,Category $category)
    {
       $this->categoryService->updateModel($category,$request->validated());
        return redirect()->to(route('categories.index'));
    }
    //Delete category by ID
    public function destroy($id)
    {
            $this->categoryService->destroy($id);
    }
}
