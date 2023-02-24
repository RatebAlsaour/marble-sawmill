<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Client;
use App\Models\Supplier;
use App\Models\SupplierWorkingDay;
use App\Models\User;
use App\Modules\EnumManager\Enums\UserTypeEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $user = User::whereMobile('00966123456789')->first();
//        if($user)
//            return;

        $users = User::factory(1)->has(Client::factory())->create([
            'type' => UserTypeEnum::Client,
            'email' => 'client@example.com',
            'mobile' => '00966123456789',
            'is_verified' => 1,
            'verified_at' => now(),
        ]);

        foreach ($users as $user) {
            $user->update([
                'resource_type' => Client::class,
                'resource_id' => $user->client->id
            ]);
        }


        // add another user
        $users = User::factory(1)->has(Client::factory())->create([
            'type' => UserTypeEnum::Client,
            'email' => 'client2@example.com',
            'mobile' => '00966123456788',
            'is_verified' => 1,
            'verified_at' => now(),
        ]);

        foreach ($users as $user) {
            $user->update([
                'resource_type' => Client::class,
                'resource_id' => $user->client->id
            ]);
        }



    }
}
