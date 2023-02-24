<?php

namespace Database\Seeders;

use App\Models\User;
use App\Modules\EnumManager\Enums\UserTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserAndRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $roles = [
            'general_manager','financial_admin', 'customer_support', 'content_manager'
        ];

        foreach ($roles as $roleName) {
            // we will create a user for each role
            $user = User::factory()->create([
                'name' =>  $roleName,
                'email' => $roleName .'@example.com',
                'type' => UserTypeEnum::MANAGERIAL
            ]);
            // create the role with guard_name admin
            // all these users can access the admin area.
            $role = Role::findOrCreate($roleName);
            $user->assignRole($role);
        }
    }
}
