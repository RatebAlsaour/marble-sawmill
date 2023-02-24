<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\Subject;
use App\Models\Supplier;
use App\Models\SupplierWorkingDay;
use App\Models\User;
use App\Modules\EnumManager\Enums\UserTypeEnum;
use App\Modules\EnumManager\Enums\WorkingDayEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(10)->has(Supplier::factory())->create([
            'type' => UserTypeEnum::Supplier
        ]);

        foreach ($users as $user) {
            $user->update([
                'resource_type' => Supplier::class,
                'resource_id' => $user->supplier->id
            ]);

        }
    }
}
