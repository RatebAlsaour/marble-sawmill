<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use ReflectionClass;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class BaseService
{
    // Constructor to bind model to repo
    public function __construct(protected Model $model)
    {
    }

    // magic method for undefined methods to redirect for repo
    public function __call($method, $args)
    {
        return $this->model->$method(...$args);
    }

    protected $sortableFields = [
        'id',
    ];

    protected $relations = [

    ];

    public function applyCustomConditions()
    {

    }

    protected function getScopeFilters(): array
    {
        return [];
    }

    public function getQuery()
    {
        $allowed_filters = [];

        foreach ($this->getScopeFilters() as $sf)//scope filters
            $allowed_filters[] = AllowedFilter::scope($sf);

        $this->query = QueryBuilder::for (get_class($this->model))
            ->allowedFilters($allowed_filters)
            ->allowedSorts($this->sortableFields);


        // apply custom conditions
        $this->applyCustomConditions();

        // load relations
        $this->query->with($this->relations);
        return $this->query;
    }
     // Method to update Models
    public function updateModel(Model $model,array $data)
    {
       $model->update($data);
    }

    
    public function getDataForDatatable()
    {
        $query = $this->getQuery()->orderByDesc('id');
        $data = $query->get();
        // getting the resource name depending on the model object
        $reflect = new ReflectionClass($this->model);
        $resource_class_name = ('\App\Http\Resources\Admin\\' .  $reflect->getShortName());
        return $resource_class_name::collection($data)->toArray(null);
    }



}

