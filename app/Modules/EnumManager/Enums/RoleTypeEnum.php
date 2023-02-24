<?php

namespace App\Modules\EnumManager\Enums;

use App\Modules\EnumManager\EnumTrait;

class RoleTypeEnum
{
    use EnumTrait;

    const GENERAL_MANAGER = 'general_manager';
    const FINANCIAL_ADMIN = 'financial_admin';
    const CUSTOMER_SUPPORT = 'customer_support';
    const CONTENT_MANAGER = 'content_manager';

}