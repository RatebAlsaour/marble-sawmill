<?php

use App\Modules\EnumManager\Enums\PermissionTypeEnum;
/**
 * Mapping permission with route
 * permission_name => route_name
 */

return [

    // Users
    PermissionTypeEnum::USER_INDEX_PERMISSION => 'users.index',
    PermissionTypeEnum::USER_STORE_PERMISSION => 'users.store',
    PermissionTypeEnum::USER_CREATE_PERMISSION => 'users.create',
    PermissionTypeEnum::USER_SHOW_PERMISSION => 'users.show',
    PermissionTypeEnum::USER_EDIT_PERMISSION => 'users.edit',
    PermissionTypeEnum::USER_UPDATE_PERMISSION => 'users.update',

    // Suppliers
    PermissionTypeEnum::Supplier_INDEX_PERMISSION => 'suppliers.index',
    PermissionTypeEnum::Supplier_STORE_PERMISSION => 'suppliers.store',
    PermissionTypeEnum::Supplier_CREATE_PERMISSION => 'suppliers.create',
    PermissionTypeEnum::Supplier_SHOW_PERMISSION => 'suppliers.show',
    PermissionTypeEnum::Supplier_EDIT_PERMISSION => 'suppliers.edit',
    PermissionTypeEnum::Supplier_UPDATE_PERMISSION => 'suppliers.update',

    // Client
    PermissionTypeEnum::Client_INDEX_PERMISSION => 'clients.index',
    PermissionTypeEnum::Client_STORE_PERMISSION => 'clients.store',
    PermissionTypeEnum::Client_CREATE_PERMISSION => 'clients.create',
    PermissionTypeEnum::Client_SHOW_PERMISSION => 'clients.show',
    PermissionTypeEnum::Client_EDIT_PERMISSION => 'clients.edit',
    PermissionTypeEnum::Client_UPDATE_PERMISSION => 'clients.update',

    // Chatting
    PermissionTypeEnum::CHATTING_INDEX_PERMISSION => 'admin.sessions.index',

    // Settings
    PermissionTypeEnum::SETTING_INDEX_PERMISSION => 'settings.index',
];
