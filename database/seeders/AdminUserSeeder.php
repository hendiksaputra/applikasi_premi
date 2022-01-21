<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@ppo.dev',
            'password' => bcrypt('superadmin'),
            'project_id' => 1
        ]);

        $user->assignRole('superadmin');
    }
}
