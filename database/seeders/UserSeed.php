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