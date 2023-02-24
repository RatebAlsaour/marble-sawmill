<?php

namespace App\Services;

use App\Http\Resources\Admin\CategoryList;
use App\Http\Resources\Category as AdminCategoriesResource;
use App\Models\Category;

use function PHPSTORM_META\map;

class CategoryService extends BaseService
{

    public function __construct(protected Category $category)
    {
        $this->model = $category;
    }
    public function getCostsForDatatable()
    {
        $query = $this->getQuery()->orderByDesc('id');
        $categories = $query->get();

        return $categories->map(function ($cgategory) {
            return (new AdminCategoriesResource($cgategory))->toArray(null);
        });
    }
         // Return categories as list
    public function getList()
    {
        $query = $this->getQuery();
        $categories = $query->get();
        return CategoryList::collection($categories)->toArray(null);
    }
}
