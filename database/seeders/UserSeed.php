<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // creates 3 test customers, our administrator and a defined user "User" to increase the efficiency of testing
        User::factory()->count(10)->create();
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'Admin@admin.com',
            'password' => bcrypt('password'),
            'type' => UserRole::MITARBEITER,
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'User@user.com',
            'password' => bcrypt('password'),
            'type' => UserRole::KUNDE,
        ]);
    }
}