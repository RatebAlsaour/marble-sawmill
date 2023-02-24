<?php

namespace App\Modules\EnumManager\Enums;

use App\Modules\EnumManager\EnumTrait;

class UserTypeEnum
{
    use EnumTrait;

    const Supplier = 'supplier';
    const Client = 'client';
    const MANAGERIAL = 'managerial';
}
