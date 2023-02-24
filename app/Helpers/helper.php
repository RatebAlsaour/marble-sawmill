<?php

use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\DataTables;

if (!function_exists('authUser')) {
    function authUser()
    {
        return \Auth()->guard('web')->check() ? \Auth()->guard('web')->user() : \Auth()->guard('sanctum')->user();
    }
}


if (!function_exists('prepareDataTable')) {
    function prepareDataTable($query, $routeName)
    {
        return DataTables::of($query)
            ->addColumn('action', function ($collection) use ($routeName) {
                $action = '';
                $viewable = \request()->get('viewable', false);
                $modifiable = \request()->get('modifiable', true);
                $deletable = \request()->get('deletable', true);
                if ($modifiable)
                    $action .= '<a href="/' . $routeName . '/' . $collection['id'] . '/edit" class="btn btn-info">' . __('admin.show_and_edit') . '</a>&nbsp;&nbsp;&nbsp;&nbsp;';

                if ($deletable)
                    $action .= '<button data-rowid="' . $collection['id'] . '" class="btn btn-danger btn-delete">' . __('admin.delete') . '</button>';

                if ($viewable)
                    $action .= '<a href="/' . $routeName . '/' . $collection['id'] . '" class="btn btn-info">' . __('admin.view') . '</a>&nbsp;&nbsp;&nbsp;&nbsp;';

                return $action;
            })
//            ->addColumn('checkbox', function ($data) {
//                return '<input type="checkbox" name="_checkbox" data-id="2"><label></label>';
//            })
//                ->rawColumns(['action', 'checkbox'])
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}

if (!function_exists('datatable_actions')) {
    function datatable_actions($model, $route_name, bool $restore = false, array $custom = null): string
    {
        if ($restore) {
            $actions = [];
            $actions['restore'] = [
                'class' => 'fa fa-arrow-up text-success',
                'other' => 'onclick="RestoreOne($(this))" data-id="' . $model->id . '" data-route="' . route("$route_name.restore") . '"',
            ];

            $actions['force delete'] = [
                'class' => 'fa fa-trash text-danger',
                'other' => 'onclick="ForceDestroy($(this))" data-id="' . $model->id . '" data-route="' . route("$route_name.forceDelete", $model->id) . '"',
            ];
        } else {
            $actions = datatable_action_buttons($model, $route_name);
        }

        if ($custom) {
            $actions = array_merge($actions, $custom);
        }
        $result = '';
        foreach ($actions as $name => $route) {
            $route_ = $route['route'] ?? '#';
            $other = $route['other'] ?? '';
            $result .= "<a title='{$name}' href='{$route_}' {$other}  > <i class='{$route['class']}' style='font-size:1.25rem;'></i> </a>";
        }
        return new \Illuminate\Support\HtmlString($result);
    }
}

if (!function_exists('datatable_action_buttons')) {

    function datatable_action_buttons($model, $route_name): array
    {
        $result = [];
        if (((request()->restore ?? false) == 'true')) {
            $result['restore'] = [
                'class' => 'fa fa-arrow-up text-success',
                'other' => 'onclick="RestoreOne($(this))" data-id="' . $model->id . '" data-route="' . route("$route_name.restore") . '"',
            ];
            $forceDestroy = route("$route_name.forceDelete", $model->id);
            $result['force delete'] = [
                'class' => 'fa fa-trash text-danger',
                'other' => 'onclick="ForceDestroy($(this))" data-id="' . $model->id . '" data-route="' . $forceDestroy . '"',
            ];
        } else {
            $destroy_route = route("$route_name.destroy", $model->id);
            $result['delete'] = [
                'class' => 'fa fa-trash text-danger',
                'other' => 'onclick="destroy($(this))" data-id="' . $model->id . '" data-route="' . $destroy_route . '"',
            ];
        }
        $result['edit'] = [
            'route' => route("$route_name.edit", $model->id),
            'class' => 'fa fa-edit',
        ];

        return $result;
    }

}


/**
 * This function loads & caches the roles for multiple use
 */
if (!function_exists('getRoles')) {
    function getRoles($id = null)
    {
        $roles = Cache::remember('roles', 24 * 60, function () {
            return \Spatie\Permission\Models\Role::all(['id', 'name']);
        });

        if (!$id)
            return $roles->toArray();

        return is_string($id) ? $roles->where('name', $id)->first()->toArray() : $roles->where('id', $id)->first()->toArray();
    }

    if (!function_exists('getCurrencies')) {
        function getCurrencies($id = null)
        {
            $currencies = Cache::remember('currencies', 24 * 60, function () {
                return \Spatie\Permission\Models\Role::all(['id', 'name']);
            });

            if (!$id)
                return $currencies->toArray();

            return is_string($id) ? $currencies->where('name', $id)->first()->toArray() : $currencies->where('id', $id)->first()->toArray();
        }
    }
}
