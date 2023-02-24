<?php

namespace Database\Seeders;

use App\Models\User;
use App\Modules\EnumManager\Enums\UserTypeEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(1)->create([
            'email' => 'admin@example.com',
            'type' => UserTypeEnum::MANAGERIAL
        ]);
    }
}
