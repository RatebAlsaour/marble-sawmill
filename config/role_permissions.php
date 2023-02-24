<?php

use App\Modules\EnumManager\Enums\{PermissionTypeEnum, RoleTypeEnum};

return [

    RoleTypeEnum::GENERAL_MANAGER => [
        // User
        PermissionTypeEnum::USER_INDEX_PERMISSION,
        PermissionTypeEnum::USER_CREATE_PERMISSION,
        PermissionTypeEnum::USER_STORE_PERMISSION,
        PermissionTypeEnum::USER_SHOW_PERMISSION,
        PermissionTypeEnum::USER_EDIT_PERMISSION,
        PermissionTypeEnum::USER_UPDATE_PERMISSION,

        // Supplier
        PermissionTypeEnum::Supplier_INDEX_PERMISSION,
        PermissionTypeEnum::Supplier_CREATE_PERMISSION,
        PermissionTypeEnum::Supplier_STORE_PERMISSION,
        PermissionTypeEnum::Supplier_SHOW_PERMISSION,
        PermissionTypeEnum::Supplier_EDIT_PERMISSION,
        PermissionTypeEnum::Supplier_UPDATE_PERMISSION,

        // Client
        PermissionTypeEnum::Client_INDEX_PERMISSION,
        PermissionTypeEnum::Client_CREATE_PERMISSION,
        PermissionTypeEnum::Client_STORE_PERMISSION,
        PermissionTypeEnum::Client_SHOW_PERMISSION,
        PermissionTypeEnum::Client_EDIT_PERMISSION,
        PermissionTypeEnum::Client_UPDATE_PERMISSION,

        // Chatting
        PermissionTypeEnum::CHATTING_INDEX_PERMISSION,

        // Setting
        PermissionTypeEnum::SETTING_INDEX_PERMISSION,
    ],

    RoleTypeEnum::FINANCIAL_ADMIN => [
    ],


    RoleTypeEnum::CUSTOMER_SUPPORT => [

    ],

    RoleTypeEnum::CONTENT_MANAGER => [

    ],


];
