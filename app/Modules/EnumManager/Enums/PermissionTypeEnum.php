<?php

namespace App\Modules\EnumManager\Enums;

use App\Modules\EnumManager\EnumTrait;

class PermissionTypeEnum
{
    use EnumTrait;

    const USER_INDEX_PERMISSION = 'index user';
    const USER_CREATE_PERMISSION = 'create user';
    const USER_STORE_PERMISSION = 'store user';
    const USER_SHOW_PERMISSION = 'show user';
    const USER_EDIT_PERMISSION = 'edit user';
    const USER_UPDATE_PERMISSION = 'update user';

    const Supplier_INDEX_PERMISSION = 'index supplier';
    const Supplier_CREATE_PERMISSION = 'create supplier';
    const Supplier_STORE_PERMISSION = 'store supplier';
    const Supplier_SHOW_PERMISSION = 'show supplier';
    const Supplier_EDIT_PERMISSION = 'edit supplier';
    const Supplier_UPDATE_PERMISSION = 'update supplier';

    const Client_INDEX_PERMISSION = 'index client';
    const Client_CREATE_PERMISSION = 'create client';
    const Client_STORE_PERMISSION = 'store client';
    const Client_SHOW_PERMISSION = 'show client';
    const Client_EDIT_PERMISSION = 'edit client';
    const Client_UPDATE_PERMISSION = 'update client';

    const SETTING_INDEX_PERMISSION = 'index setting';

    const CHATTING_INDEX_PERMISSION = 'index chatting';
}
